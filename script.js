function searchQuestion() {
  const id = document.getElementById('searchInput').value;

  fetch('index.php?id=' + encodeURIComponent(id), {
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    }
  })
  .then(response => response.json())
  .then(data => {
    const resultDiv = document.getElementById('result');
    if (data.error) {
      resultDiv.innerHTML = '<strong>Błąd:</strong> ' + data.error;
    } else {
      resultDiv.innerHTML = `<strong>ID:</strong> ${id}<br>
                             <strong>Opis:</strong> ${data.description}`;
    }
  })
  .catch(error => {
    document.getElementById('result').innerHTML = 'Wystąpił błąd podczas przetwarzania zapytania.';
    console.error(error);
  });
}
