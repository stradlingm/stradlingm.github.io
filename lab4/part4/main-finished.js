// set up canvas

const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

const width = (canvas.width = window.innerWidth);
const height = (canvas.height = window.innerHeight);

// function to generate random number

function random(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// function to generate random RGB color value

function randomRGB() {
  return `rgb(${random(0, 255)},${random(0, 255)},${random(0, 255)})`;
}

// Parent class Shape that holds the x, y, velX, and velY properties for any shapes that are children of it
class Shape {
    constructor(x, y, velX, velY) {
        this.x = x;
        this.y = y;
        this.velX = velX;
        this.velY = velY;
    }
}

// Class Definition for Ball that extends the Shape class
class Ball extends Shape {
  constructor(x, y, velX, velY, color, size) {

    // Super that takes the x, y, velX, and velY from Shape
    super(x, y, velX, velY);

    // Instantiate color and size for each Ball object
    this.color = color;
    this.size = size;

    // Added exists for each object to check if it has been eaten or is still bouncing around
    this.exists = true;
  }

  // Draw function for the Ball class
  draw() {
    ctx.beginPath();
    ctx.fillStyle = this.color;
    ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI);
    ctx.fill();
  }

  // Update function that doesnt allow the ball to leave the viewport
  update() {
    if (this.x + this.size >= width) {
      this.velX = -Math.abs(this.velX);
    }

    if (this.x - this.size <= 0) {
      this.velX = Math.abs(this.velX);
    }

    if (this.y + this.size >= height) {
      this.velY = -Math.abs(this.velY);
    }

    if (this.y - this.size <= 0) {
      this.velY = Math.abs(this.velY);
    }

    this.x += this.velX;
    this.y += this.velY;
  }

  // Collision detection function for when any ball runs into eachother and changes the color of the collided balls
  collisionDetect() {
    for (const ball of balls) {
      if (!(this === ball) && ball.exists) {
        const dx = this.x - ball.x;
        const dy = this.y - ball.y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < this.size + ball.size) {
          ball.color = this.color = randomRGB();
        }
      }
    }
  }
}

// EvilCircle class that extends the shape class
class EvilCircle extends Shape {
  constructor(x, y) {
    super(x, y, 20, 20);
    this.color = "white";
    this.size = 10;

    // Added an event listener that allows the evilCircle to move with keys 'WASD'
    window.addEventListener("keydown", (e) => {
      switch (e.key) {
        case "a":
          this.x -= this.velX;
          break;
        case "d":
          this.x += this.velX;
          break;
        case "w":
          this.y -= this.velY;
          break;
        case "s":
          this.y += this.velY;
          break;
      }
    });
  }

  // Changed draw() to use strokeStyle and stroke
  draw() {
    ctx.beginPath();
    ctx.strokeStyle = this.color;
    ctx.lineWidth = 3;
    ctx.arc(this.x, this.y, this.size, 0, 2 * Math.PI);
    ctx.stroke();
  }
  
  // CheckBounds method that keeps the evil circle from leaving the canvas
  checkBounds() {
    if (this.x + this.size >= width) {
      this.x = width - this.size;
    }

    if (this.x - this.size <= 0) {
      this.x = this.size;
    }

    if (this.y + this.size >= height) {
      this.y = height - this.size;
    }

    if (this.y - this.size <= 0) {
      this.y = this.size;
    }
  }

  collisionDetect() {
    for (const ball of balls) {
      // Added collisionDetect for EvilCircle to check if the ball exists
      if (ball.exists) {
        const dx = this.x - ball.x;
        const dy = this.y - ball.y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < this.size + ball.size) {
          // Changed from changing color with randomRGB to not existing
          ball.exists = false;
          // Decrement the ballCount variable for each ball eaten by the EvilCircle
          ballCount--;
          // Update the ballCount score for each ball eaten
          ballCountSelector.textContent = ballCount;
        }
      }
    }
  }
}

// Code that will create and store up to 25 instances of our balls 
const balls = [];

while (balls.length < 25) {
  const size = random(10, 20);
  const ball = new Ball(
    // ball position always drawn at least one ball width
    // away from the edge of the canvas, to avoid drawing errors
    random(0 + size, width - size),
    random(0 + size, height - size),
    random(-7, 7),
    random(-7, 7),
    randomRGB(),
    size
  );

  balls.push(ball);
}

// Set ballCountSelector to a querySelector for the HTML span tag inside the P element
const ballCountSelector = document.querySelector("#ballCount");

// Set ballCount to the size of the balls array
let ballCount = balls.length;

// Set the textContent of the ballCountSelector to ballCount
ballCountSelector.textContent = ballCount;

// Creat an instance of EvilCircle that is centered in the viewport
const evilCircle = new EvilCircle(width / 2, height / 2);

/*
    Loop function that sets the canvas fill color to semi-transparent black,
    draws a colored rectangle accross the whole canvas,
    Loops through all of the balls in the balls array running draw(), update()
    and collisionDetect() for each one,
    and recursively calls the function over and over again 
*/
function loop() {
  ctx.fillStyle = "rgba(0, 0, 0, 0.25)";
  ctx.fillRect(0, 0, width, height);

  for (const ball of balls) {
    // Set to only draw, update and detect collisions when balls exist
    if (ball.exists) {
      ball.draw();
      ball.update();
      ball.collisionDetect();
    }
  }

  // Added evilCircle draw(), checkBounds(), and collisionDetect() to the loop function
  evilCircle.draw();
  evilCircle.checkBounds();
  evilCircle.collisionDetect();

  requestAnimationFrame(loop);
}

// Call the loop function
loop();