using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;



namespace APLICACIONCV
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        // Navegar a AbsoluteLayoutPage
        private async void OnAbsoluteLayoutPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new Layouts.AbsoluteLayout());
        }

        // Navegar a GridLayoutPage
        private async void OnGridLayoutPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new Layouts.GridLayout());
        }

        // Navegar a StackLayoutPage
        private async void OnStackLayoutPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new Layouts.StackLayoutPage());
        }

        // Navegar a CVPage
        private async void OnCVPageClicked(object sender, EventArgs e)
        {
            await Navigation.PushAsync(new Layouts.CVPage());
        }
    }
}


