<?php

use React\Socket\ConnectionInterface;

class ConnectionsPool
{
    protected SplObjectStorage $connections;
    public function __construct()
    {
        $this->connections = new SplObjectStorage();
    }

    public function add(ConnectionInterface $connection): void
    {
        $connection->write("Welcome to the chat\n");
        $connection->write("Enter your name:\n");
        $this->setConnectionName(connection: $connection, name: '');
        $this->connections->attach($connection);
        $this->notifyAllUser(
            message: "A new user enters the chat\n",
            except:  $connection
        );

        $connection->on('data', function ($data) use($connection) {
            $name = $this->getConnectionName($connection);
            if(empty($name)) {
               $this->addNewMember($connection, $data);
                return;
            }
            $this->notifyAllUser(
                message: "$name: $data",
                except:  $connection
            );
        });

        $connection->on('close', function() use($connection) {
            $name = $this->getConnectionName($connection);

            $this->connections->attach($connection);
            $this->notifyAllUser(
                message: "A user $name leaves the chat\n",
                except:  $connection
            );
        });
        
    }

    private function getConnectionName(ConnectionInterface $connection): ?string
    {
        return $this->connections->offsetGet($connection);
    }

    private function setConnectionName(ConnectionInterface $connection, string $name): void
    {
         $this->connections->offsetSet($connection, $name);
    }

    public function notifyAllUser(string $message, ConnectionInterface  $except): void
    {
        foreach ($this->connections as $connexion) {
            if($connexion !== $except) {
                $connexion->write($message);
            }
        }
    }

    public function addNewMember(ConnectionInterface $connection, string $name): void
    {
        $name = str_replace(["\n", "\r"], '', $name);
        $this->setConnectionName($connection, $name);
        $this->notifyAllUser(
            message: "User {$name} join the chat\n",
            except:  $connection
        );
    }

}