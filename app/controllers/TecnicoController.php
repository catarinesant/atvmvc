<?php

namespace App\Controllers;

class TecnicoController {

    public function index() {

        $tecnicos = [
            ["id" => 1, "nome" => "João Silva", "especialidade" => "Redes"],
            ["id" => 2, "nome" => "Maria Santos", "especialidade" => "Hardware"],
            ["id" => 3, "nome" => "Pedro Oliveira", "especialidade" => "Software"]
        ];

        echo "<h1>Lista de Técnicos</h1>";

        foreach ($tecnicos as $tecnico) {
            echo "<p>";
            echo "Código: " . $tecnico["id"] . "<br>";
            echo "Nome: " . $tecnico["nome"] . "<br>";
            echo "Especialidade: " . $tecnico["especialidade"];
            echo "</p><hr>";
        }
    }

    public function perfil(string $id) {

        echo "<h1>Perfil do Técnico</h1>";
        echo "<p>Código do técnico consultado: " . $id . "</p>";

    }
}