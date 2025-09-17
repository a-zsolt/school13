using System;
using System.Collections.Generic;
using System.Linq;
using System.Security;
using System.Text;
using System.Threading.Tasks;

namespace egyszeruCiklusok
{
    internal class Program
    {
        static void F15()
        {
            Console.Write("Pozitív egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            for (int i = 0; i < num; i++)
            {
                Console.Write(i + " ");
            }
        }

        static void F16()
        {
            Console.Write("Pozitív egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            for (int i = 0; i < num; i++)
            {
                Console.WriteLine(i);
            }
        }

        static void F17()
        {
            Console.Write("Pozitív egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            for (int i = 1; i < num; i++)
            {
                if (num % i == 0)
                {
                    Console.WriteLine(i);
                }
            }
        }

        static void F18()
        {
            Console.Write("Pozitív egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            int divSum = 0;

            for (int i = 1; i < num; i++)
            {
                if (num % i == 0)
                {
                    divSum += i;
                }
            }

            Console.WriteLine(divSum);
        }

        static void F19()
        {
            Console.Write("Pozitív egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            int divSum = 0;

            for (int i = 1; i < num; i++)
            {
                if (num % i == 0)
                {
                    divSum += i;
                }
            }

            if (divSum == num)
            {
                Console.WriteLine("A szám tökéletes.");
            } else
            {
                Console.WriteLine("A szám nem tökéletes.");
            }
        }

        static void F20()
        {
            Console.Write("Hatványalap: ");
            int powBase = Convert.ToInt32(Console.ReadLine());
            Console.Write("Kitevő: ");
            int powUp = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine("Hatványérték: " + Math.Pow(powBase, powUp));
        }

        static void F21()
        {
            double num = 0;

            Console.WriteLine("Pozitív szám:");
            string read = Console.ReadLine();
            if (Convert.ToDouble(read) > 0)
            {
                num = Convert.ToDouble(read);
            }
            else 
            {
                Console.WriteLine("A megadott érték nem pozitív szám.");
            }
        }

        static void F22()
        {
            double sum = 0;

            bool smaller = true;
            do
            {
                Console.Write("Szám:");
                double num = Convert.ToDouble(Console.ReadLine());
                if (num < 10)
                {
                    sum += num;
                }
                else
                {
                    smaller = false;
                }
            }
            while (smaller);

            Console.WriteLine(sum);
        }

        static void F23()
        {
            Console.Write("Egész szám: ");
            int num = Convert.ToInt32(Console.ReadLine());

            bool div = true;
            Console.Write($"{num} = ");
            while (div)
            {
                if (num % 2 == 0)
                {
                    num = num / 2;
                    Console.Write(2 + "*");
                }
                else
                {
                    Console.Write(num);
                    div = false;
                }
            }
        }

        static void F24()
        {
            string word = "";
            do
            {
                Console.Write("Szó: ");
                word = Console.ReadLine();
            }
            while (word != "alma");

            Console.WriteLine("Az alma gyümölcs!");
        }

        static void F31 ()
        {
            Console.Write("Szám 1:");
            int num1 = Convert.ToInt32(Console.ReadLine());
            Console.Write("Szám 2:");
            int num2 = Convert.ToInt32(Console.ReadLine());

            int max = Math.Max(num1, num2);
            int num = max;
            while (!(num % num1 == 0 && num % num2 == 0))
            {
                num += max;
            }
            Console.WriteLine(num);

        }

        static void Main(string[] args)
        {
            //F15();
            //F16();
            //F17();
            //F18();
            //F19();
            //F20();
            //F21();
            //F21();
            //F22();
            //F23();
            //F24();
            //F25();
            //F26();
            //F27();
            //F28();
            //F29();
            //F30();
            F31();
        }
    }
}
