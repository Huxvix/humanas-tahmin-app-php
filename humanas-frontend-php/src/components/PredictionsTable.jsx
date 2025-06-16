import React from 'react';
import TableHeader from './TableHeader';
import TableBody from './TableBody';

function PredictionsTable({ data }) {
  return (
    <div className="w-full overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
      <table className="min-w-[600px] w-full table-fixed border-collapse bg-white shadow-sm">
        <TableHeader />
        <TableBody data={data} />
      </table>
    </div>
  );
}

export default PredictionsTable;