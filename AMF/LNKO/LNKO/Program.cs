using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LNKO
{
    internal class Program
    {
        static void Main(string[] args)
        {
            int m = 150;
            int n = 36;

            Console.WriteLine(LNKO(m, n));
        }

        static int LNKO (int m, int n)
        {
            int r;

            do
            {
                r = m % n;
                if (r != 0)
                {
                    n = r;
                }
            } while (r != 0);

            return n;
        }
    }
}
