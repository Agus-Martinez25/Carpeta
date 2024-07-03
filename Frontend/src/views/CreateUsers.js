import React, { useState } from 'react';
import api from '../services/api';

function CreateUser() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    api.post('/users', { name, email })
      .then(response => {
        console.log(response.data);
        // Aquí puedes actualizar la lista de usuarios o mostrar un mensaje de éxito
      })
      .catch(error => {
        console.error('Error creating user:', error);
      });
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label>Name</label>
        <input
          type="text"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
      </div>
      <div>
        <label>Email</label>
        <input
          type="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
      </div>
      <button type="submit">Create User</button>
    </form>
  );
}

export default CreateUser;