namespace _2019.okt_K;

class Program
{
    class Cb
    {
        public int ora { get; set; }
        public int perc { get; set; }
        public int adasDB { get; set; }
        public string name { get; set; }

        public Cb(string row)
        {
            string[] split = row.Split(';');
            ora = int.Parse(split[0]);
            perc = int.Parse(split[1]);
            adasDB = int.Parse(split[2]);
            name = split[3];
        }
    }
    
    static void Main(string[] args)
    {
        //2.Feladat
        List<Cb> data = File.ReadAllLines("cb.txt")
            .Skip(1)
            .Select(row => new Cb(row))
            .ToList();
        
        //3.Feladat
        Console.WriteLine($"3.Feladat: Bejegyzések száma: {data.Count}");
        
        //4.Feladat
        bool found = data.Any(cb => cb.adasDB == 4 );
        
        Console.WriteLine($"4.Feladat: {(found ? "Volt" : "Nem volt")} négy adást indító sofőr.");
        
        //5.Feladat
        Console.Write("5.Feladat: Kérek egy nevet: ");
        string queryName = Convert.ToString(Console.ReadLine());
        
        bool foundName = data.Any(cb => cb.name == queryName);

        if (!foundName)
        {
            Console.WriteLine("\tNincs ilyen nevű sofőr.");
        }
        else
        {
            int cbCount = data.Where(call => call.name == queryName).Sum(call => call.adasDB);
            Console.WriteLine($"\t{queryName} {cbCount}x használta a CB rádiót.");
        }
        
        //7.Feladat
        using (StreamWriter writer = new StreamWriter("cb2.txt"))
        {
            writer.WriteLine("Kezdes;AdasDB;Nev");
            foreach (Cb cb in data)
            {
                writer.WriteLine($"{AtszamolPercre(cb.ora, cb.perc)};{cb.adasDB};{cb.name}");
            }
        }
        
        //8.Feladat
        int numberOfDrivers = data.GroupBy(cb => cb.name).Count();

        Console.WriteLine($"8.Feladat: Sofőrök száma: {numberOfDrivers} Fő");
        
        //9.Feladat
        Dictionary<string, int> mostCbDriver = data.GroupBy(cb => cb.name).ToDictionary(cb => cb.Key, cb => cb.Sum(c => c.adasDB))
            .OrderByDescending(cb => cb.Value).ToDictionary(cb => cb.Key, cb => cb.Value);
        
        Console.WriteLine("9.Feladat: Legtöbb adást indító sofőr:");
        Console.WriteLine($"\tNév: {mostCbDriver.First().Key}");
        Console.WriteLine($"\tAdások száma: {mostCbDriver.First().Value} alkalom");
    }

    //6.Feladat
    static int AtszamolPercre(int ora, int perc)
    {
        return ora * 60 + perc;
    }
}