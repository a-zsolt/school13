using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace suranyisz
{
    internal class Program
    {

        static void F1()
        {
            Console.WriteLine("Hello Word!");
        }

        static void F2()
        {
            Console.Write("Felhaszáló név: ");
            string uNev = Console.ReadLine();

            Console.WriteLine("Yo " + uNev);
        }

        static void F3()
        {
            Console.Write("Duplázandó szám: ");
            int szam = Convert.ToInt32(Console.ReadLine());

            Console.WriteLine(szam * 2);
        }

        static void F4()
        {
            Console.Write("Első szám: ");
            int szam1 = Convert.ToInt32(Console.ReadLine());
            Console.Write("Második szám: ");
            int szam2 = Convert.ToInt32(Console.ReadLine());

            if (szam2 != 0)
            {
                Console.WriteLine(
                    $"Összegük: {szam1 + szam2}" +
                    $"\nKülönbségük: {szam1 - szam2}" +
                    $"\nSzorzatuk: {szam1 * szam2}" +
                    $"\nHányadosuk: {Convert.ToDouble(szam1) / szam2}"
                    );
            }
            else
            {
                Console.WriteLine(
                    $"Összegük: {szam1 + szam2}" +
                    $"\nKülönbségük: {szam1 - szam2}" +
                    $"\nSzorzatuk: {szam1 * szam2}"
                    );
            }
        }

        static void F5()
        {
            Console.Write("Első szám: ");
            int szam1 = Convert.ToInt32(Console.ReadLine());
            Console.Write("Második szám: ");
            int szam2 = Convert.ToInt32(Console.ReadLine());

            if (szam1 > szam2)
            {
                Console.WriteLine(szam1);
            }
            else
            {
                Console.WriteLine(szam2);
            }
        }

        static void F6()
        {
            List<int> szamok = new List<int>();

            Console.Write("Első szám: ");
            szamok.Add(Convert.ToInt32(Console.ReadLine()));
            Console.Write("Második szám: ");
            szamok.Add(Convert.ToInt32(Console.ReadLine()));
            Console.Write("Harmadik szám: ");
            szamok.Add(Convert.ToInt32(Console.ReadLine()));

            int legkisebb = szamok[0];
            for (int i = 1; i < szamok.Count; i++)
            {
                if (szamok[i] < legkisebb)
                {
                    legkisebb = szamok[i];
                }
            }

            Console.WriteLine(legkisebb);

        }

        static void F7() 
        {
            Console.Write("A oldal: ");
            int a = Convert.ToInt32(Console.ReadLine());
            Console.Write("B oldal: ");
            int b = Convert.ToInt32(Console.ReadLine());
            Console.Write("C oldal: ");
            int c = Convert.ToInt32(Console.ReadLine());

            if (a < b + c && b < a + c && c < a + b && a > 0 && b > 0 && c > 0)
            {
                Console.WriteLine("A háromszög szerkeszthető.");
            } else
            {
                Console.WriteLine("A háromszög nem szerkeszthető.");
            }
        }

        static void F8()
        {
            Console.Write("Első szám: ");
            int szam1 = Convert.ToInt32(Console.ReadLine());
            Console.Write("Második szám: ");
            int szam2 = Convert.ToInt32(Console.ReadLine());

            if (szam1 * szam2 > 0)
            {
                Console.WriteLine(Math.Sqrt(szam1 * szam2));
            }
            else
            {
                Console.WriteLine("Mindkettő számnak pozitívnak kell lennie");
            }
        }

        static void F9()
        {
            Console.Write("A: ");
            int a = Convert.ToInt32(Console.ReadLine());
            Console.Write("B: ");
            int b = Convert.ToInt32(Console.ReadLine());
            Console.Write("C: ");
            int c = Convert.ToInt32(Console.ReadLine());

            double D = Math.Pow(b, 2) - 4 * a * c;

            if (D < 0)
            {
                Console.WriteLine("Nincs megoldás");
            }
            else
            {
                Console.WriteLine("Van megoldás");
            }
        }

        static void F10()
        {
            Console.Write("A: ");
            int a = Convert.ToInt32(Console.ReadLine());
            Console.Write("B: ");
            int b = Convert.ToInt32(Console.ReadLine());
            Console.Write("C: ");
            int c = Convert.ToInt32(Console.ReadLine());

            double D = Math.Pow(b, 2) - 4 * a * c;

            if (D > 0)
            {
                Console.WriteLine($"x1: {(-b + Math.Sqrt(D)) / (2 * a)}");
                Console.WriteLine($"x2: {(-b - Math.Sqrt(D)) / (2 * a)}");
            }else if (D == 0)
            {
                Console.WriteLine($"x1: {(-b + Math.Sqrt(D)) / (2 * a)}");
            }
            else
            {
                Console.WriteLine("Nincs megoldás");
            }
        }

        static void F11()
        {
            Console.Write("Befogó 1: ");
            int befogo1 = Convert.ToInt32(Console.ReadLine());
            Console.Write("Befogó 2: ");
            int befogo2 = Convert.ToInt32(Console.ReadLine());

            double atfogo = Math.Round(Math.Sqrt(Math.Pow(befogo1, 2) + Math.Pow(befogo2, 2)), 2);

            Console.WriteLine(atfogo);

        }

        static void F12()
        {
            Console.Write("A él: ");
            double a = Convert.ToDouble(Console.ReadLine());
            Console.Write("B él: ");
            double b = Convert.ToDouble(Console.ReadLine());
            Console.Write("C él: ");
            double c = Convert.ToDouble(Console.ReadLine());

            double terfogat = a * b * c;
            double felszin = 2 * (a * b + a * c + b * c);

            Console.WriteLine($"Felszín: {felszin}");
            Console.WriteLine($"Térfogat: {terfogat}");
        }

        static void F13()
        {
            Console.Write("Kör átmérő: ");
            double d = Convert.ToDouble(Console.ReadLine());

            double kerulet = Math.PI * d;
            double terulet = Math.PI * Math.Pow(d / 2.0, 2);

            Console.WriteLine($"Kerület: {kerulet}");
            Console.WriteLine($"Terület: {terulet}");
        }

        static void F14()
        {
            Console.Write("Sugár (r): ");
            double r = Convert.ToDouble(Console.ReadLine());
            Console.Write("Középponti szög fokban (θ): ");
            double thetaDeg = Convert.ToDouble(Console.ReadLine());

            double ivhossz = (thetaDeg / 360.0) * 2.0 * Math.PI * r;
            double terulet = (thetaDeg / 360.0) * Math.PI * r * r;

            Console.WriteLine($"Határoló ív hossza: {ivhossz}");
            Console.WriteLine($"Körcikk területe: {terulet}");
        }


        static void Main(string[] args)
        {
            F1();
            F2();
            F3();
            F4();
            F5();
            F6();
            F7();
            F8();
            F9();
            F10();
            F11();
            F12();
            F13();
            F14();
        }
    }
}
