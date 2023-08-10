# Socket-Based ReactPHP Chat

This is a simple chat application built using ReactPHP, a non-blocking event-driven framework for PHP. The application uses sockets to enable real-time communication between clients.

## Features

- Real-time messaging between multiple clients.
- Minimalistic interface for demonstration purposes.

## Requirements

- PHP 7.4 or higher
- Composer (for dependency management)

## Installation

1. Clone this repository: `git clone https://github.com/devalade/react-php-labs.git`
2. Navigate to the project directory: `cd react-php-labs`
3. Install dependencies: `composer install`

## Usage

1. Start the server: `php server.php`
2. Open multiple terminal windows.
3. Connect to the server using a telnet `telnet localhost 8080` .
4. Start sending and receiving messages between different terminal.

## Configuration

- You can modify the server settings in `server.php` if needed, such as changing the host and port.

## Contributing

Contributions are welcome! If you find any bugs or have suggestions for improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgments

- This project was inspired by the need to demonstrate the capabilities of ReactPHP in creating real-time applications.

## Disclaimer

This is a basic example intended for educational purposes. It might not be suitable for production environments without further enhancements.
