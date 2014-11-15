// Boast Yelp Dataset Challenge JSON Parser
// CS 4722 Programming Project, Fall 2014
// Lee Adams, Janel Firth, David Gully

import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;

public class Tip
{
    Connection C;
    Statement S;

    public Tip(Connection C, Statement S)
    {
        this.C = C;
        this.S = S;
    }

    void readParsePush()
    {
        BufferedReader br = null;

        try
        {
            String currentLine;
            br = new BufferedReader(new FileReader("data/yelp_academic_dataset_tip.json"));
            int count = 0;

            while ((currentLine = br.readLine()) != null)
            {
                JSONObject obj = new JSONObject(currentLine.trim());
                String insert = "";

                try
                {
                    String business_id = obj.getString("business_id");
                    String user_id = obj.getString("user_id");
                    String date = obj.getString("date");
                    String text = obj.getString("text");
                    int likes = obj.getInt("likes");

                    insert = "insert into boast.tip values(\'" + business_id + "\',\'" + user_id + "\',\'" + date
                            + "\',\'" + text.replace("'", "\\'") + "\'," + likes + ");";
                    S.executeUpdate(insert);
                }
                catch (SQLException e)
                {
                    e.printStackTrace();
                    System.err.println(++count + ": " + insert);
                    continue;
                }
            }
            System.out.printf("%d\n", ++count);
        }
        catch(IOException e)
        {
            e.printStackTrace();
        }
        finally
        {
            try
            {
                if(br != null)
                {
                    br.close();
                }
            }
            catch(IOException e)
            {
                e.printStackTrace();
            }
        }
    }
}