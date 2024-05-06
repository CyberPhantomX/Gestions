import React from 'react';
import RoomList from './RoomList';
import AddRoomForm from './COMPONENTS/AddRoomForm';
import RoomItem from './COMPONENTS/RoomItem';
import Room from './BACKEND/MODELS/Room';
import roomRouts from './BACKEND/ROUTES/roomRoutes';
import videoRoutes from './BACKEND/ROUTES/videoRoutes';
import server from './BACKEND/server';

function App() {
  return (
    <div className="App">
      <h1>Gestion des salles de réunion</h1>
      <AddRoomForm />
      <RoomList />
    </div>
  );
}

export default App;
