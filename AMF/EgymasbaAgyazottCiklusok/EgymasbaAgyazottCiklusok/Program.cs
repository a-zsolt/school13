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