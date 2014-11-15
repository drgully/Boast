// Boast Yelp Dataset Challenge JSON Parser
// CS 4722 Programming Project, Fall 2014
// Lee Adams, Janel Firth, David Gully

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;

public class User
{
    Connection C;
    Statement S;

    public User(Connection C, Statement S)
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
            br = new BufferedReader(new FileReader("data/yelp_academic_dataset_user.json"));
            int count = 0;

            while ((currentLine = br.readLine()) != null)
            {
                JSONObject obj = new JSONObject(currentLine.trim());
                String insert = "";

                try
                {
                    String user_id = obj.getString("user_id");
                    String name = obj.getString("name");
                    int review_count = obj.getInt("review_count");
                    double average_stars = obj.getDouble("average_stars");
                    String elite = obj.getJSONArray("elite").toString();
                    String yelping_since = obj.getString("yelping_since");
                    int fans = obj.getInt("fans");
                    int cool = obj.getJSONObject("votes").getInt("cool");
                    int funny = obj.getJSONObject("votes").getInt("funny");
                    int useful = obj.getJSONObject("votes").getInt("useful");

                    insert = "insert into boast.user values(\'" + user_id + "\',\'" + name + "\'," + review_count + "," +
                            average_stars + ",\'" + elite + "\',\'" + yelping_since + "\'," + fans + "," + cool + "," +
                            funny + "," + useful + ");";
                    S.executeUpdate(insert);

                    JSONArray friends = obj.getJSONArray("friends");
                    for(int i = 0; i < friends.length(); i++)
                    {
                        S.executeUpdate("insert into boast.friend values(\'" + user_id + "\',\'" + friends.getString(i) + "\');");
                    }

                    JSONObject comp = obj.getJSONObject("compliments");
                    int c_cool = 0;
                    try
                    {
                        c_cool = comp.getInt("cool");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No cool compliment field.");
                    }
                    int c_funny = 0;
                    try
                    {
                        c_funny = comp.getInt("funny");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No funny compliment field.");
                    }
                    int c_hot = 0;
                    try
                    {
                        c_hot = comp.getInt("hot");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No hot compliment field.");
                    }

                    int c_more = 0;
                    try
                    {
                        c_more = comp.getInt("more");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No more compliment field.");
                    }
                    int c_note = 0;
                    try
                    {
                        c_note = comp.getInt("note");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No note compliment field.");
                    }
                    int c_photos = 0;
                    try
                    {
                        c_photos = comp.getInt("photos");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No photos compliment field.");
                    }
                    int c_plain = 0;
                    try
                    {
                        c_plain = comp.getInt("plain");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No plain compliment field.");
                    }
                    int c_profile = 0;
                    try
                    {
                        c_profile = comp.getInt("profile");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No profile compliment field.");
                    }
                    int c_writer = 0;
                    try
                    {
                        c_writer = comp.getInt("writer");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": No writer compliment field.");
                    }

                    String c_insert = "insert into boast.compliment values(\'" + user_id + "\'," + c_cool + "," + c_funny
                           + "," + c_hot + "," + c_more + "," + c_note + "," + c_photos + "," + c_plain + "," + c_profile
                           + "," + c_writer + ");";
                    S.executeUpdate(c_insert);
                }
                catch(SQLException e)
                {
                    e.printStackTrace();
                    System.err.println(++count + ": " + insert);
                    continue;
                }
                System.out.printf("%d\n", ++count);
            }
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