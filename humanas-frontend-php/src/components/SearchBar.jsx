import React from 'react'

function SearchBar({ value, onChange }) {
    return (
      <div className="mb-4 flex justify-center">
        <input
          type="text"
          placeholder="ID veya isim girin..."
          value={value}
          onChange={onChange}
          className="w-full max-w-md p-2 border border-gray-300 rounded"
        />
      </div>
    )
  }

  export default SearchBar;
  