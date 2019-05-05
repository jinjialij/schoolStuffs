import java.util.Scanner;
import java.io.*;
import java.util.regex.Pattern;
public class a1q4a {
    public static void main (String[]args) throws IOException
    {
        Scanner in = new Scanner(System.in);
        String line;

        while(in.hasNextLine())
	    {
		line=in.nextLine();
		String[] split = patternTransfer(line);
		//use patternTransfer method to deal with each input line
		for ( int i = 0; i < split.length; i++ ) {//print all elements
		    System.out.print(split[i]);
		}
		System.out.println();
	    }

    }

    public static String [] patternTransfer(String line)//pass a line
    {
        Pattern p = Pattern.compile(",");//use "," as delimiter
        String[] split1 = p.split(line,-1);//tell split not to ignore empty fields
        String[] split2 = new String[split1.length];
        /*set the last element as the first element in split2 and the rest of split2 are elements
        in split1 from index 0 to split1.length-1
        */
        split2[0] = split1[split1.length-1]+",";
        for (int i=1;i<split1.length;i++)//add "," if the element is not the last one
	    {
		if (i!=split1.length-1)
		    split2[i]=split1[i-1]+",";
		else
		    split2[i]=split1[i-1];
	    }
        return split2;
    }

}
