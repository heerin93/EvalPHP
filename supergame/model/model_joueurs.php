<?php
//MODEL POUR LA TABLE JOUEURS

class ModelPlayer {
    private int $id;
    private string $pseudo;
    private string $email;
    private int $score;
    private string $password;

    public function __construct(string $pseudo, string $email, string $password, int $score = 0, int $id = 0) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->score = $score;
        $this->password = $password;
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function getPassword(): string {
        return $this->password;
    }

    // Setters
    public function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setScore(int $score): void {
        $this->score = $score;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}

?>