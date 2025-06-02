## 🧪 Projeto de Segurança em Aplicações Web: Mini Portal Vulnerável

### 📌 Objetivo

O objetivo deste exercício é permitir que os alunos:

* Instalar e configurar uma aplicação web vulnerável em PHP e JavaScript.
* Explorar as vulnerabilidades intencionais incluídas no projeto com base no OWASP Top 10.
* Aprender a identificar, reportar e propor soluções para cada problema de segurança.

---

## 🧰 Parte 1 – Instalação e Configuração com XAMPP

### 🔧 Pré-requisitos:

* XAMPP instalado ([https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html))
* Um editor de código como VS Code (opcional)
* Navegador atualizado

### 🗂️ Passos:

1. **Descarrega os ficheiros:**

   * mini-portal-vulneravel.zip
   * vuln\_portal.sql
2. **Extrai o conteúdo de `mini-portal-vulneravel.zip`** para a pasta:

   ```
   C:\xampp\htdocs\mini-portal
   ```

3. **Importa a base de dados:**

   * Abre o `phpMyAdmin` através do `http://localhost/phpmyadmin`.
   * Clica em **Importar**.
   * Escolhe o ficheiro `vuln_portal.sql`.
   * Clica em **Executar**.

4. **Verifica a configuração da base de dados:**

   * Certifica-te de que no ficheiro `includes/db.php` as credenciais estão corretas:

     ```php
     $conn = mysqli_connect("localhost", "root", "", "vuln_portal");
     ```

5. **Inicia o XAMPP:**

   * Abre o **XAMPP Control Panel**.
   * Inicia os módulos **Apache** e **MySQL**.

6. **Acede à aplicação:**

   * Vai a: [http://localhost/mini-portal/index.php](http://localhost/mini-portal/index.php)

---

## 🔍 Parte 2 – Análise de Vulnerabilidades

### 📋 Introdução

A aplicação contém vulnerabilidades intencionais. O teu objetivo é identificá-las, reproduzi-las e propor soluções.

### ✅ Ações a realizar:

#### 1. **Injection (SQL Injection)**

* Testa o login com `admin' --` como nome de utilizador e qualquer palavra-passe.
* Identifica a ausência de *prepared statements*.

#### 2. **Broken Authentication and Session Management**

* Faz login como qualquer utilizador.
* Observa se o ID da sessão muda.
* Verifica se o cookie tem as flags `HttpOnly` e `Secure`.

#### 3. **Cross-Site Scripting (XSS)**

* Vai a `send_message.php`.
* Submete:

  ```html
  <script>alert('XSS')</script>
  ```
* Observa se o código é executado.

#### 4. **Insecure Direct Object References (IDOR)**

* Vai a `profile.php?id=1`, `id=2`, `id=3`.
* Consegues ver os dados de outros utilizadores?

#### 5. **Security Misconfiguration**

* Tenta aceder a `/uploads/`, `/includes/db.php`, etc.
* O ficheiro `phpinfo()` está ativo?

#### 6. **Sensitive Data Exposure**

* Verifica a base de dados: as passwords estão em texto plano?
* A aplicação utiliza HTTPS?

#### 7. **Missing Function Level Access Control**

* Acede diretamente a `admin.php` sem fazer login como admin.
* A aplicação impede isso?

#### 8. **Cross-Site Request Forgery (CSRF)**

* Cria uma página HTML local com:

  ```html
  <form action="http://localhost/mini-portal/update_email.php" method="POST">
    <input name="email" value="ataque@exemplo.com" type="hidden">
    <input type="submit" value="Submit">
  </form>
  ```
* Estando logado noutro separador, abre esta página e submete.

#### 9. **Using Known Vulnerable Components**

* Inspeciona os ficheiros JavaScript incluídos (ex: jQuery antigo).
* Existem bibliotecas desatualizadas?

#### 10. **Insecure Cryptographic Storage**

* Verifica como as passwords são guardadas na base de dados.
* A aplicação utiliza `MD5`, `SHA1`, ou está em texto plano?

---

## 📝 Entrega

Cada grupo deverá entregar:

1. Relatório com as vulnerabilidades encontradas:

   * Nome da falha
   * Evidência (exemplo, printscreen, passo a passo)
   * Proposta de mitigação
2. (Opcional) Código com correções aplicadas

---

## 🧠 Dica Final

Podes usar ferramentas como:

* [Burp Suite](https://portswigger.net/burp)
* [OWASP ZAP](https://www.zaproxy.org/)
* DevTools do navegador

