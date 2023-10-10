import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.swing.*;
import java.awt.*;

class MainPro {
    public static void main(String[] args) {
        Genalgo obj1 = new Genalgo();
        Timedate obj2 = new Timedate();

        JFrame inputFrame = new JFrame();
        int number = Integer.parseInt(JOptionPane.showInputDialog(inputFrame,
                "Enter the number of scratch cards you want to generate:"));
        int value = Integer.parseInt(JOptionPane.showInputDialog(inputFrame,
                "Enter the value of scratch card set:"));

        JProgressBar progressBar = new JProgressBar(0, number);
        progressBar.setStringPainted(true);

        JFrame frame = new JFrame();
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(300, 100);
        frame.setLayout(new BoxLayout(frame.getContentPane(), BoxLayout.Y_AXIS));
        frame.add(progressBar);
        frame.setVisible(true);

        String url = "jdbc:mysql://hackintra.mysql.database.azure.com:3306/scratch";
        String user = "roothackintra";
        String password = "unipassword@1234ABC";

        try (Connection connection = DriverManager.getConnection(url, user, password)) {
           
            for (int i = 0; i < number; i++) {
                progressBar.setValue(i + 1);

               
                String cardNumber = obj1.numGeneration();
                String createdTime = obj2.getCurrentTime();
                String createdDate = obj2.getCurrentDate();

             
               String insertQuery = "INSERT INTO newlycreatedcards (cardnumber, value, createdtime, createddate) VALUES (?, ?, ?, ?)";
				try (PreparedStatement preparedStatement = connection.prepareStatement(insertQuery)) {
				    preparedStatement.setString(1, cardNumber);
				    preparedStatement.setInt(2, value);
				    preparedStatement.setString(3, createdTime);
				    preparedStatement.setString(4, createdDate);
				    preparedStatement.executeUpdate();
				}

                Thread.sleep(1000);
            }

            
            frame.dispose();

            
            JOptionPane.showMessageDialog(null, "Scratch card generation Success");

            System.exit(0);

        } catch (SQLException | InterruptedException e) {
            e.printStackTrace();
        }
    }
}
