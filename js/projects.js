const boxes = document.querySelectorAll('.box');
let currentIndex = 0;

function showBox(index) {
  boxes.forEach((box, i) => {
    box.classList.remove('active');
    if (i === index) {
      box.classList.add('active');
    }
  });
}

// Initial display
showBox(currentIndex);

// Previous button
document.getElementById('prev').addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + boxes.length) % boxes.length;
  showBox(currentIndex);
});

// Next button
document.getElementById('next').addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % boxes.length;
  showBox(currentIndex);
});
