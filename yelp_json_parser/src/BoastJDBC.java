// Boast Yelp Dataset Challenge JSON Parser
// CS 4722 Programming Project, Fall 2014
// Lee Adams, Janel Firth, David Gully

import java.sql.DriverManager;

public class BoastJDBC
{
    private static java.sql.Connection C = null;
    private static java.sql.Statement S = null;

    public static void main(String[] args)
    {
        if(dbConnection())
        {
            Business business = new Business(C, S);
            business.readParsePush();

            Categories categories = new Categories(C, S);
            categories.readParsePush();

            CheckIn checkin = new CheckIn(C, S);
            checkin.readParsePush();

            Review review = new Review(C, S);
            review.readParsePush();

            Tip tip = new Tip(C, S);
            tip.readParsePush();

            User user = new User(C, S);
            user.readParsePush();
        }
    }
    private static boolean dbConnection()
    {
        boolean connected;

        try
        {
            Class.forName("com.mysql.jdbc.Driver");

            C = DriverManager.getConnection("jdbc:mysql://localhost:3306", "root", "");
            S = C.createStatement();

            connected = true;
        }
        catch(Exception e)
        {
            connected = false;
            e.printStackTrace();
        }

        return connected;
    }
}