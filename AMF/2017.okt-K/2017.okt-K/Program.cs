namespace _2017.okt_K;

class Egyszamjatek
{
    public string player { get; set; }
    public int[] guesses { get; set; }

    public Egyszamjatek(string row)
    {
        var data = row.Split(' ');
        player = data.Last();
        guesses = data.Take(data.Length - 1)
            .Select(int.Parse)
            .ToArray();
    }
}

class Program
{
    static void Main(string[] args)
    {
        //2.Fealdat
        List<Egyszamjatek> data = File.ReadAllLines("egyszamjatek.txt")
            .Select(row => new Egyszamjatek(row))
            .ToList();

        //3.Feladat
        Console.WriteLine($"3.Fealdat: Játlkosok száma: {data.Count}");

        //4.Feladat
        Console.WriteLine($"4.Fealdat: Fordulók száma: {data[0].guesses.Length}");

        //5. Feladat
        bool guess1 = data.Any(t => t.guesses[0] == 1);

        Console.WriteLine($"5.Feladat: Az első feladatban {(!guess1 ? "nem " : "")}volt egyes tipp!");

        //6. Feladat
        int maxGuess = data.SelectMany(t => t.guesses).Max();

        Console.WriteLine($"6.Feladat: A legnagyobb tipp a fordulók során: {maxGuess}");

        //7. Feladat
        Console.Write($"7.Feladat: Kérem a forduló sorszámát [1-{data[0].guesses.Length}]:");
        int selectedRound = Convert.ToInt32(Console.ReadLine()) - 1;
        if (selectedRound >= data[0].guesses.Length || selectedRound < 0) selectedRound = 0;

        // 8. Feladat:
        var roundTips = data.Select(p => p.guesses[selectedRound]);
        Dictionary<int, int> tipFrequency = roundTips.GroupBy(x => x)
            .ToDictionary(g => g.Key, g => g.Count());

        int winnerNum = tipFrequency.Where(x => x.Value == 1)
            .OrderBy(x => x.Key)
            .Select(x => x.Key)
            .FirstOrDefault();
        
        if (winnerNum == 0)
        {
            Console.WriteLine("8.Feladat: Nem volt egyedi tipp a megadott fordulóban!");
            Console.WriteLine("9. Feladat: Nem volt nyertes a megadott fordulóban!");
        }
        else
        {
            Console.WriteLine($"8.Feladat: A nyertes tipp a megadott fordulóban: {winnerNum}");

            // 9. Feladat:
            string winnerName = data.First(p => p.guesses[selectedRound] == winnerNum).player;
            Console.WriteLine($"9. Feladat: A megadott forduló nyertese: {winnerName}");

            // 10. Feladat:
            using (StreamWriter writer = new StreamWriter("nyertes.txt"))
            {
                writer.WriteLine($"Forduló sorszáma: {selectedRound + 1}.");
                writer.WriteLine($"Nyertes tipp: {winnerNum}");
                writer.WriteLine($"Nyertes játékos: {winnerName}");
            }
        }
    }
}