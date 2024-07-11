<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @import url('https://fonts.googleapis.com/css?family=Major+Mono+Display');

:root {
  --Hsl: 140;
}

* { 
  margin:  0; 
  padding: 0; 
  font-family: 'Major Mono Display', monospace;
  box-sizing: border-box;
}


body {
  background: #222;
  text-align: center;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  
  /* width */
  &::-webkit-scrollbar {
    width: 4px;
  }

  /* Track */
  &::-webkit-scrollbar-track {
    background: hsl((var(--Hsl)), 72%, 30%);
  }

  /* Handle */
  &::-webkit-scrollbar-thumb {
    background: hsl((var(--Hsl)), 72%, 78%);
    border-radius: 9999px;
  }

  /* Handle on hover */
  &::-webkit-scrollbar-thumb:hover {
    background: hsl((var(--Hsl)), 72%, 65%);
  }
}

.main-wrap {
  display: flex;
  align-items: center;
  justify-content: space-around;
  margin-bottom: 30px;
  flex: 1;
  touch-action: none;
}

canvas { 
  display: block;
  max-width: 45vw;
  height: auto;
  max-height: 50vh;
  width: auto;
}

h3,
h4 {
  color: #fff;
}

h3 {
  font-size: 14px;
  margin-bottom: 10px;
}

h4 {
  font-size: 10px;
}

.multiplier-wrap {
  display: flex;
  justify-content: space-around;
  text-align: center;
  margin: 15px 0 30px 0;
  
  button {
    padding: 4px 16px;
    width: 100px;
    border-radius: 25px;
    border-color: hsl((var(--Hsl)), 72%, 78%);
    color: #fff;
    background-color: transparent;
    outline: none;
    
     &:hover {
      cursor: pointer;
    }
  }
  
  h4 {
    margin-bottom: 4px;
    
    &:last-of-type {
      margin-bottom: 0;
      margin-top: 4px;
    }
  }
  
  #mValue {
    font-size: 16px;
  }
}

.slideContainer {
  position: relative;
  display: block;
  transform: rotate(-90deg);
  width: 200px;
  line-height: 10px;
  
  h4 {
    display: flex;
    flex-direction: row-reverse;
    position: absolute;
    bottom: 0;
    transform: translateX(-50%);
    user-select: none;
    z-index: 1;
    letter-spacing: 1px;
    bottom: 24px;
    left: 50%;
    
    span {
      transform-origin: center;
      transform: rotate(90deg);
      
      &:not(:first-of-type) {
        margin-right: 10px;
      }
    }
  }
  
  &--points h4 {
    margin-bottom: 0;
    bottom: -34px;
  }
  
  .slider {
    position: relative;
    z-index: 9999;
    -webkit-appearance: none;
    width: 100%;
    height: 2px;
    border-radius: 9999px;
    background: hsl((var(--Hsl)), 72%, 78%);
    outline: none;
    opacity: .8;
  }

  .slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width:  24px;   
    height: 24px;
    border-radius: 50%;
    background: hsl((var(--Hsl)), 72%, 68%);
    border: 2px solid #fff;
    cursor: pointer;
    opacity: 0.9;
  }

  .slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
  }
}

.coolPatterns-wrap {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  
  button {
    width:  80px;
    height: 80px;
    border-radius: 50%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border: none;
    outline: none;
    margin: 8px;
    
    &:hover {
      cursor: pointer;
    }
    
    @media (max-width: 500px) {
      width:  70px;
      height: 70px;
    }
  }
}  
    </style>
    <title>Document</title>
</head>
<body>
<div class="multiplier-wrap">
  <div class="multiplier-plusTen">
    <h4>add</h4>
    <button class="controlBtn" id="plusTen">10</button>
    <h4>to multiplier</h4>
  </div>
  
  <div class="multiplier">
    <h4>multiplier</h4>
    <button class="controlBtn" id="reset"><span id="mValue"></span></button>
    <h4>click to reset</h4>
  </div>
  
  <div class="multiplier-plusOne">
    <h4>add</h4>
    <button class="controlBtn" id="plusOne">1</button>
    <h4>to multiplier</h4>
  </div>
</div>

<div class="main-wrap">
  <div class="slideContainer slideContainer--speed">
    <input 
     type="range" 
     id="speed" 
     class="slider"
     name="speed"
     min="0" 
     max="0.02" 
     value="0.008" 
     step="0.0001">
    <h4 draggable="false" id="speedLabel">speed</h4>
  </div>
  
  <canvas id="canvas"></canvas>

  <div class="slideContainer slideContainer--points">
    <input 
     type="range" 
     id="points" 
     class="slider"
     name="points" 
     min="2" 
     max="200" 
     value="160" 
     step="1">
    <h4 draggable="false" id="pointsLabel">points</h4>
  </div>
</div>

<h3>some cool patterns</h3>
<div class="coolPatterns-wrap">
  <button onclick="patterns(21)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/21m.gif);">
  </button>
  
  <button onclick="patterns(51)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/51.gif);">
  </button>
  
  <button onclick="patterns(99)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/99m.gif);">
  </button>
  
  <button onclick="patterns(86)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/86m.gif);">
  </button>
  
  <button onclick="patterns(91)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/91m.gif);">
  </button>
 
  <button onclick="patterns(68)" style="background-image:url(https://raw.githubusercontent.com/EntropyReversed/times-tables/master/68m.gif);">
  </button>
</div>

<script>
const distance = (x1, y1, x2, y2) => Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);

const map = (value, minA, maxA, minB, maxB) => (1 - (value - minA) / (maxA - minA)) * minB + (value - minA) / (maxA - minA) * maxB;

//////////////////////

const ctx = canvas.getContext('2d');
const root = document.documentElement;
const size = 500;
const sizeHalf = Math.floor(size * 0.5);
const pointR = 2;
const radius = Math.floor((size - pointR * 2 - 2) * .5);
const controls = [
  {button: plusTen, value: 10}, 
  {button: plusOne, value: 1}, 
  {button: reset, value: 0}
];
let multiplier = 1;

canvas.width   = size;
canvas.height  = size;

const line = (c, hue, alpha) => {
  ctx.strokeStyle = `hsla(${hue}, 100%, 85%, ${alpha})`;
  ctx.beginPath();
  ctx.moveTo(c.x, c.y);
  ctx.lineTo(c.x2, c.y2);
  ctx.stroke();
};

const circle = (c, color = '#fff') => {
  ctx.strokeStyle = color;
  ctx.beginPath();
  ctx.arc(c.x, c.y, c.radius, 0, Math.PI * 2);
  ctx.stroke();
};

const patterns = value => {
  multiplier = value;
  speed.value  = 0;
  points.value = points.max;
};

[speedLabel, pointsLabel].forEach((label) => {
  label.innerHTML = [...label.textContent].map(
    letter => `<span>${letter}</span>`
  ).join('');
});

const setHTMLandCSS = (hue) => {
  mValue.textContent = parseFloat(Math.round(multiplier * 100) / 100).toFixed(2);
  root.style.setProperty('--Hsl', hue);
}

const calculateCoordinates = (fraction) => {
  const calculateCoordinate = (value) => Math.sin(value) * radius + sizeHalf;
  const calculateX = (value) => calculateCoordinate(value - Math.PI * 0.5);
  const calculateY = (value) => calculateCoordinate(value);
  return { 
    x: calculateX(fraction),
    y: calculateY(fraction),
    x2: calculateX(fraction * multiplier),
    y2: calculateY(fraction * multiplier)
  };
};

const drawGraph = () => {
  const numberOfPoints = +points.value;
  multiplier >= 999 ? (multiplier = 0) : (multiplier += +speed.value);
  const hue = multiplier * 100 % 360;
  setHTMLandCSS(hue);
  
  ctx.clearRect(0, 0, size, size);
  circle({x: sizeHalf, y: sizeHalf, radius}, '#333');

  for (let i = 0; i < numberOfPoints; i++) {
    const { x, y, x2, y2 } = calculateCoordinates(Math.PI * 2 / numberOfPoints * i);
    const mapA = map(distance(x, y, x2, y2), 0, radius * 1.73, 1, 0.25);
    const alpha = mapA > 1 ? 1 : +mapA.toFixed(2);

    circle({x, y, radius: pointR});
    line({x, y, x2, y2}, hue, alpha);
  }

  requestAnimationFrame(drawGraph);
};

controls.forEach(({button, value}) => {
  button.addEventListener('click', () => multiplier = value === 0 ? 0 : multiplier + value);
});

window.addEventListener('load', drawGraph);
</script>
</body>
</html>