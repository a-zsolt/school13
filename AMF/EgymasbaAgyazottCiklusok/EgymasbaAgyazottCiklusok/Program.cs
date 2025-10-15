using System.Text;
using System.Reflection;

namespace EgymasbaAgyazottCiklusok;

class Program
{
    static int inputInt()
    {
        try
        {
            Console.Write("Szám: ");
            int number = Convert.ToInt32(Console.ReadLine());
            return number;
        }
        catch
        {
            Console.WriteLine("Nem szám lett megadva!");
            throw;
        }
    }
    
    static int inputString()
    {
        try
        {
            Console.Write("Szöveg:");
            int number = Convert.ToInt32(Console.ReadLine());
            return number;
        }
        catch
        {
            Console.WriteLine("Nem szöveg lett megadva!");
            throw;
        }
    }

    static void selectTask()
    {
        try
        {
            Console.Write("Task number to run:");
            string funcToRun = Console.ReadLine();
            var type = typeof(Program);
            var mi = type.GetMethod(funcToRun!, BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Static);
            mi.Invoke(null, null);
        }
        catch (Exception e)
        {
            Console.WriteLine(e);
            throw;
        }
    }

    static void F32()
    {
        int szam = inputInt();

        for (int i = 1; i < 10; i++)
        {
            Console.WriteLine($"{szam} * {i} = {szam * i}");
        }
    }

    static void F33()
    {
        int num =  inputInt();
        
        int[,] szumTable =  new int[10, 10];

        int numToAdd = 1;
        for (int i = 0; i < szumTable.GetLength(0); i++)
        {
            for (int j = 0; j < szumTable.GetLength(1); j++)
            {
                szumTable[i, j] = num + numToAdd;
            }
            numToAdd++;
        }
        
        for (int i = 0; i < szumTable.GetLength(0); i++)
        {
            for (int j = 0; j < szumTable.GetLength(1); j++)
            {
                Console.Write(szumTable[i, j]);
            }

            if (i % 10 == 0)
            {
                Console.WriteLine();
            }
        }
        
    }

    static void F34()
    {
    }
    
    static void F42()
    {
        int[]
        
        for (int i = 0; i < 5; i++)
        {
            
        }
    }

    static void F35()
    {   
        string chars = "abcdefghijklmnopqrstuvwxyz";
        
        string[,] acii = new string[3, 10];

        int row = 0;
        int col = 0;
        for (int i = 0; i < chars.Length; i++)
        {
            if (row < 10)
            {
                acii[col, row] = $"{Convert.ToString(chars[i])} {(int)chars[i]}";
            } else if (col < 3)
            {
                row = 0;
                col++;
                acii[col, row] = $"{Convert.ToString(chars[i])} {(int)chars[i]}";
            }

            row++;
        }

        row = 0;
        col = 0;
        while (col < acii.GetLength(1) && acii.GetLength(0) < 4)
        {
            if (col < 3)
            {
                Console.Write(acii[col, row] + "     ");
                col++;
            } else if (row < 10)
            {
                Console.WriteLine();
                col = 0;
                row++;
                
            }
        }
    }
    
    static void Main(string[] args)
    {
        selectTask();
    }
}