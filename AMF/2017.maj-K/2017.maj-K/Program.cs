using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _2017.maj_K
{
    class Helsinki
    {
        public int helye { get; set; }
        public int sprtDB { get; set; }
        public string sprtg { get; set; }
        public string vrsnysz { get; set; }

        public Helsinki(string row) 
        {
            string[] data = row.Split(' ');
            helye = Convert.ToInt32(data[0]);
            sprtDB = Convert.ToInt32(data[1]);
            sprtg = data[2];
            vrsnysz = data[3];
        }
    }

    internal class Program
    {
        static void Main(string[] args)
        {
            List<Helsinki> pontSzerzesek = new List<Helsinki>();

            foreach (string row in File.ReadAllLines("helsinki.txt"))
            {
                pontSzerzesek.Add(new Helsinki(row));
            }

            Console.WriteLine("3.Feladat:");
            Console.WriteLine($"Pontszerző helyezések száma: {pontSzerzesek.Count}");

            Console.WriteLine("4.Feladat:");
            Dictionary<int, int> ermek = new Dictionary<int, int>();
            foreach (Helsinki item in pontSzerzesek)
            {
                if (item.helye <= 3)
                {
                    if (ermek.ContainsKey(item.helye))
                    {
                        ermek[item.helye]++;
                    } else
                    {
                        ermek.Add(item.helye, 1);
                    }
                }
            }
            
            Console.WriteLine($"Arany: {ermek[1]}\nEzüst: {ermek[2]}\nBronz: {ermek[3]}\nÖsszesen: {ermek.Values.Sum()}");

            
            Console.WriteLine("5.Feladat:");

            int pontok = 0;
            foreach (Helsinki item in pontSzerzesek)
            {
                if (item.helye == 1)
                {
                    pontok += 7;
                }
                else
                {
                    pontok += 7 - item.helye;
                }
            }

            Console.WriteLine($"Olimpiai pontok száma: {pontok}");

            
            Console.WriteLine("6.Feladat:");
            int uszasE = 0, tornaE = 0;

            foreach (Helsinki item in pontSzerzesek)
            {
                if (item.helye <= 3)
                {
                    if (item.sprtg == "torna") tornaE ++;
                    if (item.sprtg == "uszas") uszasE++;
                }
            }

            if (tornaE != uszasE)
            {
                Console.WriteLine(uszasE > tornaE ? "Úszás" : "Torna" + " sportágban szerezteg több érmet.");
            }
            else
            {
                Console.WriteLine("Egyenlő volt az érmek száma.");
            }


            //7.Feladat
            
            StreamWriter fixedHelsinki =  new StreamWriter("helsinki2.txt");
            foreach (Helsinki item in pontSzerzesek)
            {
                int pont = 0;
                
                if (item.helye == 1)
                {
                    pont += 7;
                }
                else
                {
                    pont += 7 - item.helye;
                }

                if (item.sprtg == "kajakkenu")
                {
                    item.sprtg = "kajak-kenu";
                }
                
                fixedHelsinki.WriteLine($"{item.helye} {item.sprtDB} {pont} {item.sprtg} {item.vrsnysz}");
            }
            fixedHelsinki.Close();

            
            Console.WriteLine("8.Feladat:");
            int maxSprtDB = 0;
            int maxSprtDBI = 0;
            for (int i = 0; i < pontSzerzesek.Count; i++)
            {
                if (pontSzerzesek[i].sprtDB > maxSprtDB)
                {
                    maxSprtDB = pontSzerzesek[i].sprtDB;
                    maxSprtDBI = i;
                }
            }

            Console.WriteLine($"Helyezés: {pontSzerzesek[maxSprtDBI].helye}\nSportág: {pontSzerzesek[maxSprtDBI].sprtg}\nVersenyszám: {pontSzerzesek[maxSprtDBI].vrsnysz}\nSportolók száma: {pontSzerzesek[maxSprtDBI].sprtDB}");
        }
    }
}
