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
import java.util.ArrayList;
import java.util.List;
import java.util.SortedSet;
import java.util.TreeSet;

class Categories
{
    Connection C;
    Statement S;

    public Categories(Connection C, Statement S)
    {
        this.C = C;
        this.S = S;
    }

    public void readParsePush()
    {
        BufferedReader br = null;
        SortedSet<String> categories = new TreeSet<String>();
        List<String> sortedCats = null;

        try
        {
            String currentLine;
            br = new BufferedReader(new FileReader("data/yelp_academic_dataset_business.json"));
            int count = 0;

            while ((currentLine = br.readLine()) != null)
            {
                JSONObject obj = new JSONObject(currentLine.trim());
                JSONArray catArr;

                try
                {
                    catArr = obj.getJSONArray("categories");
                    count++;
                }
                catch(JSONException e)
                {
                    System.err.println(count + ": Hours JSON Exception");
                    continue;
                }

                for(int i = 0; i < catArr.length(); i++)
                {
                    categories.add(catArr.get(i).toString());
                }
            }

            sortedCats = new ArrayList<String>(categories);
            for(int i = 0; i < sortedCats.size(); i++)
            {
                try
                {
                    String name = sortedCats.get(i);
                    S.executeUpdate("insert into boast.categories(name) values(\'" + name.replace("'", "\\'") + "\');");
                }
                catch(SQLException e)
                {
                    e.printStackTrace();
                }
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

        try
        {
            String currentLine;
            br = new BufferedReader(new FileReader("data/yelp_academic_dataset_business.json"));

            while ((currentLine = br.readLine()) != null)
            {
                JSONObject obj = new JSONObject(currentLine.trim());
                String business = obj.getString("business_id");
                JSONArray cat_arr = obj.getJSONArray("categories");

                for(int i = 0; i < cat_arr.length(); i++)
                {
                    int cat_id = sortedCats.indexOf(cat_arr.get(i)) + 1;
                    try
                    {
                        S.executeUpdate("insert into boast.bus_cat values(" + "\'" + business + "\'," + cat_id + ");");
                    }
                    catch(SQLException e)
                    {
                        e.printStackTrace();
                    }
                }
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