package mg.mialy.tp.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MysqlConnexion {
    private Connection connexion;
    public MysqlConnexion(){
        String url = "jdbc:mysql://localhost:3307/testdb"; // "ma_base" = nom de la base
        String user = "root";  // Nom d'utilisateur MySQL
        String password = "root";  // Mot de passe MySQL

        try {
            // 1. Charger le driver MySQL (facultatif avec Java 6+)
            Class.forName("com.mysql.cj.jdbc.Driver");
            // 2. Établir la connexion
            this.connexion  = DriverManager.getConnection(url, user, password);
            System.out.println("Connexion réussie à la base de données !");

        } catch (ClassNotFoundException e) {
            System.out.println("Driver JDBC non trouvé !");
            e.printStackTrace();
        } catch (SQLException e) {
            System.out.println("Erreur lors de la connexion !");
            e.printStackTrace();
        }
    }

    public Connection getConnexion() {
        return connexion;
    }
}
