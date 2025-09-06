package mg.mialy.tp.view;

import mg.mialy.tp.dao.EtudiantDao;
import mg.mialy.tp.model.Etudiant;

import javax.swing.*;
import java.awt.*;
import java.sql.SQLException;

public class SimpleWindow extends JFrame{
    JTextField nomField = new JTextField();
    JTextField prenomField = new JTextField();
    JTextField emailField = new JTextField();
    JComboBox sexField = new JComboBox(new String[]{"Homme", "Femme"});;
    JTextField ageField = new JTextField();
    JButton saveButton = new JButton("Save");

    EtudiantDao dao = new EtudiantDao();

    public SimpleWindow() {
        // Appel du constructeur de la classe JFrame
        super("Ma première fenêtre Swing");

        JPanel contenaire = new JPanel(new GridLayout(6,2));
        // Définir la taille
        this.setSize(400, 500);

        contenaire.add(new JLabel("Nom"));
        contenaire.add(nomField);
        contenaire.add(new JLabel("Prenom"));
        contenaire.add(prenomField);
        contenaire.add(new JLabel("Email"));
        contenaire.add(emailField);
        contenaire.add(new JLabel("Sexe"));
        contenaire.add(sexField);
        contenaire.add(new JLabel("Age"));
        contenaire.add(ageField);
        contenaire.add(saveButton);

        // Fermer le programme quand on ferme la fenêtre
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        this.setContentPane(contenaire);

        // Centrer la fenêtre sur l’écran
        this.setLocationRelativeTo(null);

        // Rendre la fenêtre visible
        this.setVisible(true);
        this.initAction();
    }


    private void initAction(){
        saveButton.addActionListener(e->{
            System.out.println("Nom: " + nomField.getText());
            System.out.println("Prenom: " + prenomField.getText());
            System.out.println("Email: " + emailField.getText());
            System.out.println("Sexe: " + sexField.getSelectedItem());
            System.out.println("Age: " + ageField.getText());

            Etudiant etudiant = new Etudiant(
                    Integer.parseInt(ageField.getText()),
                    (String) sexField.getSelectedItem(),
                    emailField.getText(),
                    prenomField.getText(),
                    nomField.getText(),
                    null
            );
            try {
                dao.save(etudiant);
                JOptionPane.showMessageDialog(this, "Etudiant enregistré avec succès!");
            } catch (SQLException ex) {
                throw new RuntimeException(ex);
            }
        });
    }

}
