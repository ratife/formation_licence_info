package mg.mialy.tp.dao;

import mg.mialy.tp.model.Etudiant;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class EtudiantDao {
    private Connection connexion;

    public EtudiantDao(){
        MysqlConnexion mysqlConnexion = new MysqlConnexion();
        this.connexion = mysqlConnexion.getConnexion();
    }

    public void save(Etudiant etudiant) throws SQLException {
        String sql = """
            INSERT INTO etudiants (nom, prenom, email, sexe, age) VALUES 
            (?, ?, ?, ?, ?)
        """;

        PreparedStatement statement = this.connexion.prepareStatement(sql);
        statement.setString(1, etudiant.getNom());
        statement.setString(2, etudiant.getPrenom());
        statement.setString(3, etudiant.getEmail());
        statement.setString(4, etudiant.getSexe());
        statement.setInt(5, etudiant.getAge());

        int lignesAffectees = statement.executeUpdate();
        if (lignesAffectees > 0) {
            System.out.println("Insertion réussie ! " + lignesAffectees + " ligne(s) ajoutée(s).");
        }
    }
}
