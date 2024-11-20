using System;
using Xamarin.Forms;

namespace APLICACIONCV
{
    public partial class DynamicCVPage : ContentPage
    {
        public DynamicCVPage()
        {
            InitializeComponent();
        }

        // Evento al hacer clic en el botón "Generar CV"
        private async void OnGenerateCVClicked(object sender, EventArgs e)
        {
            // Obtener los datos del formulario
            string name = NameEntry.Text;
            string position = PositionEntry.Text;
            string email = EmailEntry.Text;
            string phone = PhoneEntry.Text;
            string skills = SkillsEntry.Text;

            // Comprobar si se ha ingresado algo
            if (string.IsNullOrEmpty(name) || string.IsNullOrEmpty(position) || string.IsNullOrEmpty(email) || string.IsNullOrEmpty(phone))
            {
                await DisplayAlert("Error", "Por favor ingresa todos los campos obligatorios", "OK");
                return;
            }

            // Crear un layout para mostrar el CV generado dinámicamente
            var cvLayout = new StackLayout
            {
                Padding = 20
            };

            cvLayout.Children.Add(new Label { Text = "CV Dinámico", FontSize = 30, HorizontalOptions = LayoutOptions.Center });
            cvLayout.Children.Add(new Label { Text = $"Nombre: {name}", FontSize = 20 });
            cvLayout.Children.Add(new Label { Text = $"Puesto: {position}", FontSize = 20 });
            cvLayout.Children.Add(new Label { Text = $"Correo: {email}", FontSize = 20 });
            cvLayout.Children.Add(new Label { Text = $"Teléfono: {phone}", FontSize = 20 });
            cvLayout.Children.Add(new Label { Text = "Habilidades: ", FontSize = 20 });

            if (!string.IsNullOrEmpty(skills))
            {
                var skillList = skills.Split(',');
                foreach (var skill in skillList)
                {
                    cvLayout.Children.Add(new Label { Text = $"- {skill.Trim()}", FontSize = 18 });
                }
            }

            // Mostrar el CV generado en la página
            Content = cvLayout;
        }
    }
}
