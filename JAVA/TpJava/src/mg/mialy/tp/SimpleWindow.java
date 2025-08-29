package mg.mialy.tp;

import javax.swing.JFrame;
import javax.swing.JLabel;

public class SimpleWindow extends JFrame{
    public SimpleWindow() {
        // Appel du constructeur de la classe JFrame
        super("Ma première fenêtre Swing");
        // Définir la taille
        this.setSize(400, 500);

        // Fermer le programme quand on ferme la fenêtre
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        // Ajouter un petit texte
        JLabel label = new JLabel("Bonjour, voici ma fenêtre Swing !", JLabel.CENTER);
        this.add(label);

        // Centrer la fenêtre sur l’écran
        this.setLocationRelativeTo(null);

        // Rendre la fenêtre visible
        this.setVisible(true);
    }
}
