package mg.mialy.tp.model;

public class Etudiant {
    private Long id;
    private String nom;
    private String prenom;
    private String email;
    private String sexe;
    private int age;

    public Etudiant(int age, String sexe, String email, String prenom, String nom, Long id) {
        this.age = age;
        this.sexe = sexe;
        this.email = email;
        this.prenom = prenom;
        this.nom = nom;
        this.id = id;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getSexe() {
        return sexe;
    }

    public void setSexe(String sexe) {
        this.sexe = sexe;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }
}
