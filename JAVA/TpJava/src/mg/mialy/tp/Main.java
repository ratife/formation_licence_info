package mg.mialy.tp;

import mg.mialy.tp.dao.MysqlConnexion;
import mg.mialy.tp.view.SimpleWindow;

public class  Main{
    public static void main(String[] args) {
        SimpleWindow window = new SimpleWindow();
        System.out.println("Hello, World!");
        MysqlConnexion mysqlConnexion = new MysqlConnexion();
    }
}