import React from 'react';
import TableRow from './TableRow';

function TableBody({ data }) {
  if (!data.length) {
    return (
      <tbody>
        <tr>
          <td colSpan={5} className="py-4 text-center text-gray-500">
            Sonuç bulunamadı.
          </td>
        </tr>
      </tbody>
    );
  }

  return (
    <tbody>
      {data.map(user => (
        <TableRow key={user.user_id} user={user} />
      ))}
    </tbody>
  );
}

export default TableBody;