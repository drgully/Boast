// Boast Yelp Dataset Challenge JSON Parser
// CS 4722 Programming Project, Fall 2014
// Lee Adams, Janel Firth, David Gully

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;
import org.json.JSONException;
import org.json.JSONObject;

public class Business
{
    Connection C;
    Statement S;

    public Business(Connection C, Statement S)
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
            br = new BufferedReader(new FileReader("data/yelp_academic_dataset_business.json"));
            int count = 0;

            while ((currentLine = br.readLine()) != null)
            {
                JSONObject obj = new JSONObject(currentLine.trim());
                String insert = "";
                String business_id = "";
                count++;

                try
                {
                    // Business relation attributes
                    business_id = obj.getString("business_id");
                    String categories = obj.getJSONArray("categories").toString();
                    String name = obj.getString("name");
                    String neighborhoods = obj.getJSONArray("neighborhoods").toString();
                    String full_address = obj.getString("full_address");
                    String city = obj.getString("city");
                    String state = obj.getString("state");
                    double latitude = obj.getDouble("latitude");
                    double longitude = obj.getDouble("longitude");
                    String open = Boolean.toString(obj.getBoolean("open"));
                    String attributes = obj.getJSONObject("attributes").toString();
                    double stars = obj.getDouble("stars");
                    int review_count = obj.getInt("review_count");

                    insert = "insert into boast.business values(\'" + business_id + "\',\'" + categories.replace("'", "\\'") + "\',\'" +
                            name.replace("'", "\\'") + "\',\'" + neighborhoods + "\',\'" + full_address.replace("'", "\\'")
                            + "\',\'" + city + "\',\'" + state + "\'," + latitude + "," + longitude + ",\'" + open + "\',\'"
                            + attributes + "\'," + stars + "," + review_count + ");";
                    S.executeUpdate(insert);
                }
                catch (SQLException e)
                {
                    e.printStackTrace();
                    System.err.println(count + ": " + insert);
                }

                JSONObject hours = obj.getJSONObject("hours");
                String h_insert = "";
                try
                {
                    // Hours relation attributes
                    String mon_op = "";
                    try
                    {
                        mon_op = hours.getJSONObject("Monday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Monday open JSON Object not found.");
                    }
                    String mon_cl = "";
                    try
                    {
                        mon_cl = hours.getJSONObject("Monday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Monday close JSON Object not found.");
                    }
                    String tue_op = "";
                    try
                    {
                        tue_op = hours.getJSONObject("Tuesday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Tuesday open JSON Object not found.");
                    }
                    String tue_cl = "";
                    try
                    {
                        tue_cl = hours.getJSONObject("Tuesday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Tuesday close JSON Object not found.");
                    }
                    String wed_op = "";
                    try
                    {
                        wed_op = hours.getJSONObject("Wednesday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Wednesday open JSON Object not found.");
                    }
                    String wed_cl = "";
                    try
                    {
                        wed_cl = hours.getJSONObject("Wednesday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Wednesday close JSON Object not found.");
                    }
                    String thu_op = "";
                    try
                    {
                        thu_op = hours.getJSONObject("Thursday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Thursday open JSON Object not found.");
                    }
                    String thu_cl = "";
                    try
                    {
                        thu_cl = hours.getJSONObject("Thursday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Thursday close JSON Object not found.");
                    }
                    String fri_op = "";
                    try
                    {
                        fri_op = hours.getJSONObject("Friday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Friday open JSON Object not found.");
                    }
                    String fri_cl = "";
                    try
                    {
                        fri_cl = hours.getJSONObject("Friday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Friday close JSON Object not found.");
                    }
                    String sat_op = "";
                    try
                    {
                        sat_op = hours.getJSONObject("Saturday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Saturday open JSON Object not found.");
                    }
                    String sat_cl = "";
                    try
                    {
                        sat_cl = hours.getJSONObject("Saturday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Saturday close JSON Object not found.");
                    }
                    String sun_op = "";
                    try
                    {
                        sun_op = hours.getJSONObject("Sunday").getString("open");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Sunday open JSON Object not found.");
                    }
                    String sun_cl = "";
                    try
                    {
                        sun_cl = hours.getJSONObject("Sunday").getString("close");
                    }
                    catch(JSONException e)
                    {
                        System.err.println(count + ": Sunday close JSON Object not found.");
                    }

                    try
                    {
                        h_insert = "insert into boast.hours values(\'" + business_id + "\',\'" + mon_op + "\',\'" + mon_cl + "\',\'" +
                                tue_op + "\',\'" + tue_cl + "\',\'" + wed_op + "\',\'" + wed_cl + "\',\'" + thu_op + "\',\'" + thu_cl + "\',\'" +
                                fri_op + "\',\'" + fri_cl + "\',\'" + sat_op + "\',\'" + sat_cl + "\',\'" + sun_op + "\',\'" + sun_cl + "\');";
                        S.executeUpdate(h_insert);
                    }
                    catch (SQLException e)
                    {
                        e.printStackTrace();
                        System.err.println(count + ": Hours SQL Exception: " + h_insert);
                    }
                }
                catch(JSONException e)
                {
                    //e.printStackTrace();
                    System.err.println(count + ": Hours JSON Exception");
                    continue;
                }
            }
            System.out.printf("%d\n", count);
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