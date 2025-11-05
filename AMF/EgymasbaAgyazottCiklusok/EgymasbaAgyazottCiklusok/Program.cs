using System.Text;
using System.Reflection;
using System.Diagnostics;

namespace EgymasbaAgyazottCiklusok;

class Program
{
    static int inputInt(string msg = "Szám")
    {
        try
        {
            Console.Write($"{msg}:");
            int number = Convert.ToInt32(Console.ReadLine());
            return number;
        }
        catch
        {
            Console.WriteLine("Nem szám lett megadva!");
            throw;
        }
    }
    
    static string inputString(string msg = "Szöveg")
    {
        try
        {
            Console.Write($"{msg}:");
            string text = Console.ReadLine();
            return text;
        }
        catch
        {
            Console.WriteLine("Nem szöveg lett megadva!");
            throw;
        }
    }

    static void fileMaker(string fileName, int fileRows, int minNum, int maxNum)
    {
        List<string> numbers = new List<string>();

        Random rnd = new Random();

        for (int i = 0; i < fileRows; i++)
        {
            numbers.Add(rnd.Next(minNum, maxNum).ToString());
        }

        File.WriteAllLines(fileName, numbers);
    }

    static List<int> readNumsInList(string fileName) 
    {
        List<int> numbers = new List<int>();
        string[] fileRead = File.ReadAllLines(fileName);


        foreach (string num in fileRead)
        {
            numbers.Add(Convert.ToInt32(num));
        }

        return numbers;
    }

    static void selectTask()
    {
        try
        {
            Console.Write("Feladat száma:");
            string funcToRun = Console.ReadLine();
            var type = typeof(Program);
            var mi = type.GetMethod($"F{funcToRun}"!, BindingFlags.Public | BindingFlags.NonPublic | BindingFlags.Static);
            mi.Invoke(null, null);
        }
        catch (Exception e)
        {
            Console.WriteLine(e);
            throw;
        }
    }

    static bool isPrime (int num)
    {
        bool div = false;
        int numToCheck = 2;
        do
        {
            if (num % numToCheck == 0)
            {
                div = true;
            }
            numToCheck++;
        }
        while (numToCheck < num - 1 && !div);

        return div;
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

    static void F38()
    {
        int height = inputInt("Magasság");

        for (int i = 1; i <= height; i++)
        {
            for (int j = 0; j <= height - i; j++)
            {
                Console.Write(" ");
            }
            for (int j = 0; j < i * 2 - 1; j++)
            {
                Console.Write("*");
            }
            Console.WriteLine();
        }
    }

    static void F39()
    {
        int height = inputInt("Magasság");
        int width = inputInt("Szélesség");

        string[,] matrix = new string[height, width];

        for (int j = 0; j < matrix.GetLength(1); j++)
        {
            matrix[0, j] = "*";
            matrix[matrix.GetLength(0) - 1, j] = "*";
        }

        for (int i = 0; i < matrix.GetLength(0); i++)
        {
            matrix[i, 0] = "*";
            matrix[i, matrix.GetLength(1) - 1] = "*";
        }

        for (int i = 0; i < matrix.GetLength(0); i++)
        {
            for (int j = 0; j < matrix.GetLength(1); j++)
            {
                if (matrix[i, j] == null)
                {
                    Console.Write(" ");
                } else
                {
                    Console.Write(matrix[i, j]);
                }
            }
            Console.WriteLine();
        }
    }

    static void F41()
    {
        string chars = "abcdefghijklmnopqrstuvwxyz".ToUpper();

        for (int i = 0; i < 27; i++)
        {
            Console.WriteLine(chars);
            char moving = chars[0];
            chars = chars.Substring(1) + moving;
        }
    }

    static void F49()
    {
        List<int> numbers = new List<int>();

        int times = inputInt("Mennyi szám legyen a tömben");

        for (int i = 0; i < times; i++)
        {
            numbers.Add(inputInt($"{i + 1}. Szám"));
        }

        for (int i = 0; i < numbers.Count - 1; i++)
        {
            for (int j = 0; j < numbers.Count - i - 1; j++)
            {
                if (numbers[j] > numbers[j + 1])
                {
                    int temp = numbers[j];
                    numbers[j] = numbers[j + 1];
                    numbers[j + 1] = temp;
                }
            }
        }

        foreach (var item in numbers)
        {
            Console.WriteLine(item);
        }
    }

    static void F57 ()
    {
        string[] mondat = inputString().Split(' ');

        foreach (var szo in mondat)
        {
            Console.WriteLine(szo[0].ToString().ToUpper() + szo.Substring(1));
        }


    }

    static void F67()
    {
        fileMaker("forras67.be", 50, 0, 500);
        List<int> numbers = new List<int>(readNumsInList("forras67.be"));

        int evenSum = 0;
        foreach (int number in numbers)
        {
            if (number % 2 == 0)
            {
                evenSum += number;
            }
        }

        Console.WriteLine($"A páros számok összege: {evenSum}");

    }

    static void F70()
    {
        fileMaker("forras70.be", 300, 1, 500);

        List<int> numbers = new List<int>();
        string[] fileRead = File.ReadAllLines("forras70.be");


        foreach (string num in fileRead)
        {
            numbers.Add(Convert.ToInt32(num));
        }

        Console.WriteLine($"Számok összege: {numbers.Sum()}, Számok átlaga: {numbers.Sum() / numbers.Count()}");


        int primes = 0;
        foreach (int num in numbers)
        {
            if (isPrime(num))
            {
                primes++;
            }
        }

        Console.WriteLine($"Pímszámok darabja: {primes}");

        int smallestPrime = 999999999;
        int smallestPrimeIndex = 0;
        for (int i = 0; i < numbers.Count - 1; i++)
        {
            if (isPrime(numbers[i]))
            {
                if (numbers[i] < smallestPrime)
                {
                    smallestPrime = numbers[i];
                    smallestPrimeIndex = i;
                }
            }
        }

        List<int> evenNums = new List<int>();
        for (int i = 0; i < smallestPrimeIndex; i++)
        {
            if (i % 2 == 0)
            {
                evenNums.Add(numbers[i]);
            }
        }

        Console.WriteLine($"A legkissebb prím előtti páros számok átlaga: {evenNums.Sum() / evenNums.Count()}");

        
        for (int i = 0; i < numbers.Count; i++)
        {
            if (isPrime(numbers[i]))
            {
                
            }
        }
        
        int y = 0;
        List<int> firstAndSecPrimeIndex = new List<int>();
        do
        {
            if (isPrime(numbers[y]))
            {
                firstAndSecPrimeIndex.Add(y);
            }
            y++;
        }
        while (y < numbers.Count && firstAndSecPrimeIndex.Count < 2);

        List<int> betweenFirstAndSec = new List<int>();
        for (int i = firstAndSecPrimeIndex[0]; i < firstAndSecPrimeIndex[1]; i++)
        {
            betweenFirstAndSec.Add(numbers[i]);
        }

        Console.WriteLine($"Első és a második prímszám között található számok összege: {betweenFirstAndSec.Sum()}");


    }
    
    static void Main(string[] args)
    {
        selectTask();
    }
}