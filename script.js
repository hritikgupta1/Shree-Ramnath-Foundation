// for changing color of nav buttons after get clicked
// highlight the current page link
document.querySelectorAll('.nav-link').forEach(link => {
  if (link.href === window.location.href) {
    link.classList.add('active');
  }
});

// Contact form script
document.getElementById("contactForm").addEventListener("submit", async function (event) {
  event.preventDefault();

  const formData = {
      name: this.name.value,
      email: this.email.value,
      Mobile: this.Mobile.value,
      message: this.message.value
  };

  const responseMessage = document.getElementById("responseMessage");

  try {
      const response = await fetch("send.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json"
          },
          body: JSON.stringify(formData)
      });

      const result = await response.json();

      if (response.ok) {
          responseMessage.style.color = "green";
          responseMessage.textContent = result.message || "Message sent successfully!";
          this.reset(); // Clear the form
      } else {
          responseMessage.style.color = "red";
          responseMessage.textContent = result.message || "Error sending message.";
      }

  } catch (error) {
      responseMessage.style.color = "red";
      responseMessage.textContent = "An unexpected error occurred.";
      console.error("Error:", error);
  }
});


