<?php include './components/header.php'; ?>

<header>
  <h1>Contact Us</h1>
</header>

<section>
  <h2>Get in Touch</h2>
  <p>We'd love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out to us.</p>

  <h2>Contact Information</h2>
  <p><strong>Address:</strong> 123 Movie Lane, Cityville</p>
  <p><a href="mailto:info@cinestar.com">info@cinestar.com</a></p>
  <a href="tel:+1 (555) 123-4567">
    <p><strong>Phone:</strong> +1 (555) 123-4567</p>
  </a>

  <h2>Visit Us</h2>
  <p>Our cinema is conveniently located in the heart of Cityville. Come and experience the magic of movies with us!</p>

  <h2>Connect with Us</h2>
  <p>Stay updated on the latest movie releases, events, and promotions by following us on social media:</p>
  <ul>
    <li><a href="https://www.facebook.com/cinestar" target="_blank">Facebook</a></li>
    <li><a href="https://twitter.com/cinestar" target="_blank">Twitter</a></li>
    <li><a href="https://www.instagram.com/cinestar" target="_blank">Instagram</a></li>
  </ul>
</section>

<section>
  <h2>Get in Touch</h2>
  <p>We'd love to hear from you! Use the form below to send us a message.</p>

  <form action="./phpmailer/mail_cod.php" method="post">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email">

    <label for="message">Your Message:</label>
    <textarea id="message" name="message" rows="4"></textarea>

    <button type="submit">Send Message</button>
  </form>
</section>
<?php include './components/footer.php'; ?>