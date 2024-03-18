
import './App.css';
import Navbar from './components/Navbar';
import Layout from './components/Layout';
import Hero from './components/Hero';
import Howto from './components/Howto';
import Sphere from './components/Sphere';
import About from './components/Blogs';
import Blog from './components/About';
import Card from './components/Card';
import Carousel from './components/Carousel';
import Gallery from './components/Gallery';
import Contact from './components/Contact';
import Footer from './components/Footer';



function App() {
  return (
    <div className="App">
      <Navbar />
      <Hero />
      <Howto />
      <Sphere />
      <Gallery />
      <Card />
      <Carousel />
      <About />
      <Blog />
      <Contact />
      <Footer />
    </div>
  );
}

export default App;
