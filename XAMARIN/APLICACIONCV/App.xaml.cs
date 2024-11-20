using System;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;


namespace APLICACIONCV
{
    public partial class App : Application
    {
        public App()
        {
            InitializeComponent();

            // Establecer la página principal como una NavigationPage
            MainPage = new NavigationPage(new MainPage());
        }

        protected override void OnStart()
        {
        }

        protected override void OnSleep()
        {
        }

        protected override void OnResume()
        {
        }
    }
}
