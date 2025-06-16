import React, { useState, useEffect } from 'react';

function ScrollToTopButton() {
  const [show, setShow] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      // kaç pixel sonra buton gözükecek (AYARLA)
      setShow(window.pageYOffset > 300);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  if (!show) return null; 

  return (
    <button
        onClick={scrollToTop}
        className="
            fixed bottom-8 right-8 
            w-12 h-12 
            bg-blue-600 text-white 
            rounded-full shadow-lg 
            flex items-center justify-center
            hover:bg-blue-700
            focus:outline-none focus:ring-2 focus:ring-blue-300
            transition
        "
        aria-label="Scroll to top"
    >
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="size-6">
        <path strokeLinecap="round" strokeLinejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
    </svg>
    </button>
  );
}

export default ScrollToTopButton;