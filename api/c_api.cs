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

        private static string api = "http://localhost/c_login_system/api/";

        private static string token { get; set; }
        
        public static bool c_login(string c_username, string c_password, string c_hwid = "meme")
        {
            if (c_hwid == "meme") c_hwid = WindowsIdentity.GetCurrent().User.Value;

            string result = dec(dec(new WebClient().DownloadString(api + "c_handle.php" + "?m=a&username=" + c_username + "&password=" + c_password + "&hwid=" + c_hwid)));
            if(result == "empty_username")
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
            else
            {
                token = result;
                return true;
            }
        }
        public static byte[] c_dll() => new WebClient().DownloadData(api + "c_download.php" + "?t=" + token);
    }
}
