using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
using System.Windows.Forms;
using System.Security.Principal;

namespace c_handler
{
    class c_api
    {
        public static string dec(string _) => Encoding.UTF8.GetString(Convert.FromBase64String(_));

        private static string api = "http://localhost/api/";

        private static string token { get; set; }
        
        public static bool c_login(string c_username, string c_password, string c_hwid = "meme")
        {
            if (c_hwid == "meme") c_hwid = WindowsIdentity.GetCurrent().User.Value;

            string result = dec(c_aesar.decipher(dec(new WebClient().DownloadString(api + "c_handle.php" + "?m=a&username=" + c_username + "&password=" + c_password + "&hwid=" + c_hwid)), 8));
            
            if(result == "")
            {
                MessageBox.Show("empty_response");
                return false;
            }
            else if(result == "empty_username")
            {
                MessageBox.Show("empty_username");
                return false;
            }
            else if (result == "invalid_username")
            {
                MessageBox.Show("invalid_username");
                return false;
            }
            else if (result == "empty_password")
            {
                MessageBox.Show("empty_password");
                return false;
            }
            else if (result == "wrong_password")
            {
                MessageBox.Show("wrong_password");
                return false;
            }
            else if (result == "no_sub")
            {
                MessageBox.Show("no_sub");
                return false;
            }
            else if (result == "wrong_hwid")
            {
                MessageBox.Show("wrong_hwid");
                return false;
            }
            else if(result.Contains("logged_in"))
            {
                string[] s = result.Split('|');
                token = s[1];
                return true;
            }
            else
            {
                MessageBox.Show("unknown_response");
                return false;
            }
        }
        public static byte[] c_dll() => new WebClient().DownloadData(api + "c_download.php" + "?t=" + token);
    }
    class c_aesar
    {
        public static char cipher(char ch, int key) {
            if (!char.IsLetter(ch))
                return ch;
            
            char d = char.IsUpper(ch) ? 'A' : 'a';
            return (char)((((ch + key) - d) % 26) + d);
        }

        public static string encipher(string input, int key) {
            string output = string.Empty;

            foreach (char ch in input)
                output += cipher(ch, key);

            return output;
        }
        public static string decipher(string input, int key) => encipher(input, 26 - key);
    }
}
