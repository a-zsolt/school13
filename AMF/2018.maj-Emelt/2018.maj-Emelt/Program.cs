namespace _2018.maj_Emelt;

class Tarsalgo
{
    public int ora { get; set; }
    public int perc { get; set; }
    public int id { get; set; }
    public bool be { get; set; }

    public Tarsalgo(string line)
    {
        string[] columns = line.Split(' ');
        ora = int.Parse(columns[0]);
        perc = int.Parse(columns[1]);
        id = int.Parse(columns[2]);
        if (columns[3] == "be")
        {
            be = true;
        }
        else
        {
            be = false;
        }
    }
}

class Program
{
    static void Main(string[] args)
    {
        //1.Feladat
        List<Tarsalgo> belepesek = new List<Tarsalgo>();

        foreach (var line in File.ReadAllLines("ajto.txt"))
        {
            belepesek.Add(new Tarsalgo(line));
        }

        //2.Feladat
        int eBelepo = 0;
        int uKilepo = 0;
        int y = 0;
        do
        {
            if (belepesek[y].be)
            {
                eBelepo = belepesek[y].id;
            }

            y++;
        } while (eBelepo == 0 && y < belepesek.Count);
        
        y = belepesek.Count - 1;
        do
        {
            if (!belepesek[y].be)
            {
                uKilepo = belepesek[y].id;
            }

            y--;
        } while (uKilepo == 0 && y >= 0);
        
        Console.WriteLine($"Első belépő: {eBelepo}, Utolsó kilépő: {uKilepo}");

        //3.Fealdat
        Dictionary<int, int> athaladasok = new Dictionary<int, int>();

        foreach (var athaladas in belepesek)
        {
            if (athaladasok.ContainsKey(athaladas.id))
            {
                athaladasok[athaladas.id]++;
            }
            else
            {
                athaladasok[athaladas.id] = 1;
            }
        }

        StreamWriter writer = new StreamWriter("athaladas.txt");
        foreach (var athaladas in athaladasok.OrderBy(athaladas => athaladas.Key))
        {
            writer.WriteLine($"{athaladas.Key}: {athaladas.Value}");
        }

        writer.Close();

        //4.Feladat
        List<int> bentMaradt = new List<int>();
        
        foreach (var athaladas in belepesek)
        {
            if (athaladas.be)
            {
                bentMaradt.Add(athaladas.id);
            }
            else
            {
                bentMaradt.Remove(athaladas.id);
            }
        }
        bentMaradt.Sort();

        Console.Write("A végén a társalgóban voltak: ");
        foreach (var id in bentMaradt)
        {
            Console.Write(id + " ");
        }
        
        //5.Feladat
        List<int> bentLevok = new List<int>();
        int maxLetszam = 0;
        int maxLetszamOra = 0;
        int maxLetszamPerc = 0;
        
        foreach (var athaladas in belepesek)
        {
            if (athaladas.be)
            {
                bentLevok.Add(athaladas.id);
                if (bentLevok.Count > maxLetszam)
                {
                    maxLetszam = bentLevok.Count;
                    maxLetszamOra = athaladas.ora;
                    maxLetszamPerc = athaladas.perc;
                }
            }
            else
            {
                bentLevok.Remove(athaladas.id);
            }
        }

        Console.WriteLine($"\n{maxLetszamOra}:{maxLetszamPerc}-kor voltak legtöbben a társalgóban.");
        
        //6.Feladat
        Console.Write("Adja meg a személy azonosítóját: ");
        int searchId = Convert.ToInt32(Console.ReadLine());
        
        //7.Feladat
        foreach (var athaladas in belepesek)
        {
            if (athaladas.id  == searchId && athaladas.be)
            {
                Console.Write($"{athaladas.ora}:{athaladas.perc}-");
            } else if (athaladas.id == searchId && !athaladas.be)
            {
                Console.WriteLine($"{athaladas.ora}:{athaladas.perc}");
            }
        }
        
        //8.Feladat
        int eltelP = 0;
        bool vanE = false;
        for (int i = 0; i < belepesek.Count - 1; i++)
        {
            if (belepesek[i].be && belepesek[i].id == searchId)
            {
                y = i + 1;
                vanE = false;
                do
                {
                    if (!belepesek[y].be && belepesek[y].id == searchId)
                    {
                        int totalMinutes1 = (belepesek[i].ora * 60) + belepesek[i].perc;
                        int totalMinutes2 = (belepesek[y].ora * 60) + belepesek[y].perc;
                        
                        eltelP += totalMinutes2 - totalMinutes1;
                        
                        vanE = true;
                    }

                    y++;
                } while (y < belepesek.Count - 1 && !vanE);
            }
        }

        Console.Write($"\nA(z) {searchId}. személy összesen {eltelP} percet volt bent, a megfigyelés végén " + (vanE ? "nem tarózkodott a társalgóban." : "a társalgóban volt."));

}
}