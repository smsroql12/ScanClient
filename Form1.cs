using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Microsoft.Speech;
using Microsoft.Speech.Synthesis;

namespace TTS_Service_Demo
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        SpeechSynthesizer ts = new SpeechSynthesizer();
        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                ts.Speak("hello my name is isaac");
            }
            catch(Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (!string.IsNullOrWhiteSpace(textBox1.Text))
                ts.Speak("입력하신 숫자는" + textBox1.Text + "입니다");
            else
                ts.Speak("숫자를 입력 해 주세요.");
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            ts.SelectVoice("Microsoft Server Speech Text to Speech Voice (ko-KR, Heami)");
            ts.SetOutputToDefaultAudioDevice();
        }
    }
}
