using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Imaging;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data;
using MySql.Data.MySqlClient;

namespace WindowsFormsApplication21
{
    public partial class Form1 : Form
    {
        int cR, cG, cB;


        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.ShowDialog();
            Bitmap bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            int x, y, mR=0, mG=0, mB=0;
            x = e.X; y = e.Y;
            for (int i = x; i < x + 10;i++)
                for (int j = y; j < y + 10; j++)
                {
                    c = bmp.GetPixel(i, j);
                    mR = mR + c.R;
                    mG = mG + c.G;
                    mB = mB + c.B;
                }
            mR = mR / 100;
            mG = mG / 100;
            mB = mB / 100;
            cR = mR;
            cG = mG;
            cB = mB;
            textBox1.Text = cR.ToString();
            textBox2.Text = cG.ToString();
            textBox3.Text = cB.ToString();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap cpoa = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 1; i < bmp.Width; i++)
                for (int j = 1; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    cpoa.SetPixel(i, j, c);
                }
            pictureBox2.Image = cpoa;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = "Server=localhost;UserID=usuario324;Database=bdimagen;Password=123456;";
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "INSERT INTO color VALUES(1," + cR + "," + cG + "," + cB + ",'Red')";
            ada.Fill(ds);
        }

        private void button4_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = "Server=localhost;UserID=usuario324;Database=bdimagen;Password=123456;";
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "INSERT INTO color VALUES(2," + cR + "," + cG + "," + cB + ",'Green')";
            ada.Fill(ds);
        }

        private void button5_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = "Server=localhost;UserID=usuario324;Database=bdimagen;Password=123456;";
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "INSERT INTO color VALUES(3," + cR + "," + cG + "," + cB + ",'Blue')";
            ada.Fill(ds);
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap cpoa = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            Color[] cs = {Color.Red,Color.Green,Color.Blue};
            for (int k = 1; k <= 3; k++)
            {
                convierte(k);
                for (int i = 1; i < bmp.Width; i++)
                    for (int j = 1; j < bmp.Height; j++)
                    {
                        c = bmp.GetPixel(i, j);
                        if (((cR - 10) < c.R) && (c.R < (cR + 10)) && ((cG - 10) < c.G) && (c.G < (cG + 10)) && ((cB - 10) < c.B) && (c.B < (cB + 10)))
                            cpoa.SetPixel(i, j, cs[k-1]);
                        else
                            cpoa.SetPixel(i, j, c);
                    }
                bmp = cpoa;
            }
            pictureBox2.Image = cpoa;
        }

        private void button7_Click(object sender, EventArgs e)
        {
            int meR, meG, meB;
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap cpoa = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            Color[] cs = { Color.Red, Color.Green, Color.Blue };
            for (int p = 1; p <= 3; p++)
            {
                convierte(p);
                for (int i = 0; i < bmp.Width - 10; i += 10)
                    for (int j = 0; j < bmp.Height - 10; j += 10)
                    {
                        meR = 0;
                        meG = 0;
                        meB = 0;

                        for (int k = i; k < i + 10; k++)
                            for (int l = j; l < j + 10; l++)
                            {
                                c = bmp.GetPixel(k, l);
                                meR = meR + c.R;
                                meG = meG + c.G;
                                meB = meB + c.B;
                            }
                        meR = meR / 100;
                        meG = meG / 100;
                        meB = meB / 100;

                        if (((cR - 10) < meR) && (meR < (cR + 10)) && ((cG - 10) < meG) && (meG < (cG + 10)) && ((cB - 10) < meB) && (meB < (cB + 10)))
                            for (int k = i; k < i + 10; k++)
                                for (int l = j; l < j + 10; l++)
                                {
                                    cpoa.SetPixel(k, l, cs[p - 1]);
                                }

                        else
                            for (int k = i; k < i + 10; k++)
                                for (int l = j; l < j + 10; l++)
                                {
                                    c = bmp.GetPixel(k, l);
                                    cpoa.SetPixel(k, l, c);
                                }
                    }
                bmp = cpoa;
            }
            pictureBox2.Image = cpoa;
        }

        private void convierte(int n)
        {
            MySqlCommand Query = new MySqlCommand();
            MySqlConnection Conexion;
            MySqlDataReader consultar;
            string sql = "Server=localhost;UserID=usuario324;Database=bdimagen;Password=123456;";
                try
                {
                Conexion = new MySqlConnection();
                Conexion.ConnectionString = sql;
                Conexion.Open();
                Query.CommandText = "SELECT r,g,b FROM color WHERE id = " + n;
                Query.Connection = Conexion;
                consultar = Query.ExecuteReader();
                while (consultar.Read())
                {
                    cR = consultar.GetInt32(0);
                    cG = consultar.GetInt32(1);
                    cB = consultar.GetInt32(2);
                }
                Conexion.Close();
                }
                catch (MySqlException error)
                {
                    MessageBox.Show(error.Message);
                }
        }

        private void button8_Click(object sender, EventArgs e)
        {
            MySqlConnection con = new MySqlConnection();
            MySqlDataAdapter ada = new MySqlDataAdapter();
            DataSet ds = new DataSet();
            con.ConnectionString = "Server=localhost;UserID=usuario324;Database=bdimagen;Password=123456;";
            ada.SelectCommand = new MySqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "DELETE FROM color WHERE id > 0 and id < 4";
            ada.Fill(ds);
        }

       

  

    }
}
