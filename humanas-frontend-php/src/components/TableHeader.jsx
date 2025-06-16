import React from 'react';

function TableHeader() {
    const headers = [
      'ID',
      'İsim',
      'Son Giriş',
      'Tahmini Sonraki Giriş (Algoritma 1)',
      'Tahmini Sonraki Giriş (Algoritma 2)',
    ];
    return (
      <thead>
        <tr className="bg-gray-100 divide-x divide-gray-200">
          {headers.map((text, idx) => (
            <th key={idx} className="px-1 py-0.5 sm:px-2 text-center align-middle">
              {text}
            </th>
          ))}
        </tr>
      </thead>
    )
  }

export default TableHeader;
