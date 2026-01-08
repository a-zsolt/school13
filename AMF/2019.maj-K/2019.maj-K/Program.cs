using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _2019.maj_K
{
    internal class Program
    {
        class Versenyzo
        {
            public string Nev { get; }
            public int Rajtszam { get; }
            public string Kategoria { get; }
            public string Ido { get; }
            public int TavSzazalek { get; }

            public bool CelbaErt => TavSzazalek == 100;

            // 6. feladat: idő órában
            public double IdoOraban
            {
                get
                {
                    var p = Ido.Split(':');
                    int h = int.Parse(p[0]);
                    int m = int.Parse(p[1]);
                    int s = int.Parse(p[2]);
                    return h + (m / 60.0) + (s / 3600.0);
                }
            }

            public Versenyzo(string sor)
            {
                var d = sor.Split(';');
                Nev = d[0].Trim();
                Rajtszam = int.Parse(d[1].Trim());
                Kategoria = d[2].Trim();
                Ido = d[3].Trim();
                TavSzazalek = int.Parse(d[4].Trim());
            }
        }

        static void Main(string[] args)
        {
            // 2. feladat: beolvasás
            List<Versenyzo> v = File.ReadAllLines("ub2017egyeni.txt")
                .Skip(1)
                .Where(sor => !string.IsNullOrWhiteSpace(sor))
                .Select(sor => new Versenyzo(sor))
                .ToList();

            // 3. feladat
            Console.WriteLine($"3. feladat: Egyéni indulók száma: {v.Count}");

            // 4. feladat
            int noiTeljesitok = v.Count(x => x.Kategoria == "Noi" && x.CelbaErt);
            Console.WriteLine($"4. feladat: Teljes távot teljesítő női sportolók száma: {noiTeljesitok}");

            // 5. feladat
            Console.Write("5. feladat: Kérem egy sportoló nevét: ");
            string nev = Console.ReadLine() ?? "";

            // "A keresést ne folytassa..." -> FirstOrDefault/Any megáll, amint talál
            var talalat = v.FirstOrDefault(x => x.Nev == nev);

            if (talalat == null)
            {
                Console.WriteLine("Indult egyéniben a sportoló? Nem");
            }
            else
            {
                Console.WriteLine("Indult egyéniben a sportoló? Igen");
                Console.WriteLine($"Teljesítette a teljes távot? {(talalat.CelbaErt ? "Igen" : "Nem")}");
            }

            // 7. feladat
            double ferfiAtlag = v
                .Where(x => x.Kategoria == "Ferfi" && x.CelbaErt)
                .Average(x => x.IdoOraban);

            Console.WriteLine($"7. feladat: Teljes távot teljesítő férfi sportolók átlagos ideje: {ferfiAtlag:F2} óra");

            // 8. feladat: győztesek (kategóriánként a legjobb idő a 100%-osok között)
            var noiGyoztes = v
                .Where(x => x.Kategoria == "Noi" && x.CelbaErt)
                .OrderBy(x => x.IdoOraban)
                .First();

            var ferfiGyoztes = v
                .Where(x => x.Kategoria == "Ferfi" && x.CelbaErt)
                .OrderBy(x => x.IdoOraban)
                .First();

            Console.WriteLine("8. feladat: Kategória győztesei");
            Console.WriteLine($"Női: {noiGyoztes.Nev} ({noiGyoztes.Rajtszam}) - {noiGyoztes.Ido}");
            Console.WriteLine($"Férfi: {ferfiGyoztes.Nev} ({ferfiGyoztes.Rajtszam}) - {ferfiGyoztes.Ido}");
        }
    }
}
